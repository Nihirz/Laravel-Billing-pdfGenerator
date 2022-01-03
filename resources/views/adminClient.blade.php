@extends('layouts.main')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Clients</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header row">
                        <strong class="card-title col-lg-6">Clients Table</strong>
                        <div class="text-right col-lg-6">
                            <a data-toggle="modal" data-target="#addCLientModal" class="btn btn-primary">Add
                                Clients</a>
                        </div>
                    </div>
                    <div class="card-body row">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered"
                            id="CategoryTabel">
                            <thead>
                                <tr>
                                    
                                    <th class="col-lg-2">Name</th>
                                    <th class="col-lg-2">Email</th>
                                    <th class="col-lg-2">Phone</th>
                                    <th class="col-lg-2">Address</th>
                                    <th class="col-lg-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($client)>0)
                                @foreach ($client as $client)
                                <tr>
                                    {{-- <td>{{$client->id}}</td> --}}
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>{{$client->address}}</td>
                                    <td>
                                        <a href="{{route('detail.client',$client->id)}}" class="btn btn-dark btn-sm"><i class="fa fa-info" aria-hidden="true" style="font-size: 15px"></i></a>
                                        <a href="{{route('edit.client',$client->id)}}" data-toggle="modal" data-target="#EditClientModal" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 15px"></i></a>
                                        <a href="{{route('delete.client',$client->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 15px"></i></a>
                                        <a href="{{route('download.pdf',$client->id)}}" class="btn btn-info btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 15px"></i></a>
                                    </td>
                                </tr>    
                                @endforeach    
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

{{-- Add Client Modal --}}
<div id="addCLientModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                <h4 class="modal-title">Add New Client</h4>
            </div>
            <div class="modal-body">
                <form id="addCategory" name="addCategory" action="{{route('store.client')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="txtCatName">Client Name:</label>
                        <input type="text" class="form-control"  placeholder="Enter Client Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="txtCatName">Client Email:</label>
                        <input type="email" class="form-control"  placeholder="Enter Client Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="txtCatName">Client Phone:</label>
                        <input type="number" class="form-control"  placeholder="Enter Client Phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="txtCatName">Client Address:</label><br>
                        <textarea name="address" id="" cols="65" rows="5" placeholder="Enter Client Address"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- Edit Client Modal --}}
<div class="modal fade" id="EditClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="addCategory" name="addCategory" action="{{route('update.client')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$client->id}}">
                <div class="form-group">
                    <label for="txtCatName">Client Name:</label>
                    <input type="text" class="form-control" value="{{$client->name}}" placeholder="Enter Client Name" name="name">
                </div>
                <div class="form-group">
                    <label for="txtCatName">Client Email:</label>
                    <input type="email" class="form-control" value="{{$client->email}}" placeholder="Enter Client Email" name="email">
                </div>
                <div class="form-group">
                    <label for="txtCatName">Client Phone:</label>
                    <input type="number" class="form-control" value="{{$client->phone}}"  placeholder="Enter Client Phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="txtCatName">Client Address:</label><br>
                    <textarea name="address" id="" cols="65" rows="5" placeholder="Enter Client Address">{{$client->address}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
        </div>
      </div>
    </div>
  </div>
{{-- /Edit Client Modal --}}
<script src="{{asset('admin_assets/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/js/main.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin_assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
@endsection
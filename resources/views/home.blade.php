@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('admin.client')}}">
                    <div class="card">
                            <div class="card-img-overlay " >
                                <i class="fa fa-address-card" style="font-size:200px;color:#867979;"></i><h3 class="card-title text-dark">Clients Quotation</h3>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

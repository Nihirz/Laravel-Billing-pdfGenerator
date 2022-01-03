<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\AdminClient;
// use Illuminate\Support\Facades\App\Client;
use App\Client;
class AdminClientController extends Controller
{
    public function index()
    {
        $client = Client::get();
        return view('adminClient',compact('client'));
    }
    public function store(Request $request)
    {
        $client = new Client();
        $client->name =$request->input('name');
        $client->email =$request->input('email'); 
        $client->phone =$request->input('phone'); 
        $client->address =$request->input('address'); 
        $client->save();

        return redirect()->back();
    }
    public function edit($id)
    {
        $client=Client::where('id',$id)->first();
        return redirect()->back()->with(compact('client'));
    }
    public function update(Request $request,$id)
    {
        $client =Client::find($request->id);
        $client->name=$request->input('name');
        $client->email=$request->input('email');
        $client->phone=$request->input('phone');
        $client->address=$request->input('address');        
        $client->save();
        return redirect()->route('admin.category')->with('success', 'edit product Updated Successfully!');
    }

    public function delete($id)
    {
        $client = Client::where('id',$id)->delete();    
        return redirect()->back();
    }
    public function new($id)
    {
        $client =Client::find($request->id);
        return view('viewDetail');
    }
    
}

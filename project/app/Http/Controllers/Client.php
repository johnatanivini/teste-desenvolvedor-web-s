<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Client extends Controller
{
    
    public function index(Request $request){
        return view('client.index',['algumacoisa'=> memory_get_usage(true)]);
    }

    public function create(Request $request){
        return view('client.create',[]);
    }

    public function details($id){
        return view('client.details',[]);
    }
}

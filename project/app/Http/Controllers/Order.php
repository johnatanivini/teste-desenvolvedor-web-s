<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Order extends Controller
{
    
    public function index(Request $request){
        return view('order.index',[]);
    }

    public function create(Request $request){
        return view('order.create',[]);
    }

    public function details($id){
        return view('order.details',[]);
    }



}

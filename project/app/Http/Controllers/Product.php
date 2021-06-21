<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Product extends Controller
{
    
    public function index(Request $request){
        return view('product.index',[]);
    }

    public function create(Request $request){
        return view('product.create',[]);
    }

    public function details($id){
        return view('product.details',[]);
    }



}

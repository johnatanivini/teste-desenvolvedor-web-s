<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order as ModelsOrder;
use Illuminate\Http\Request;


class Order extends Controller
{
    
    public function index(Request $request){

        return view('order.index',[]);
    }

    public function form(Request $request){

        return view('order.create',[]);
    }

    public function details($id){
        $order = ModelsOrder::find($id);
        return view('order.details',['order'=>$order]);
    }

    public function store($id){

    }

    public function destroy($id){

        return [];
    }



}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\People;
use Illuminate\Http\Request;


class Client extends Controller
{
    
    public function index(Request $request){

        
        $peoples = People::name(request('name'))
        ->email(request('email'))
        ->cpf(request('cpf'))
        ->order(request('order'),request('order_type'));

        $peoples = $peoples->paginate(20);

        return view('client.index',['peoples'=> $peoples]);
    }

    public function create(Request $request){
        return view('client.create',[]);
    }

    public function details($id){
        return view('client.details',[]);
    }
}

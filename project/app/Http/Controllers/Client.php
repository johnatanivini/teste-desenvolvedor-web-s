<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class Client extends Controller
{
    
    public function index(){
        
        $peoples = People::name(request('name'))
        ->email(request('email'))
        ->cpf(request('cpf'))
        ->order(request('order'),request('order_type'));

        $peoples = $peoples->paginate(20);

        return view('client.index',['peoples'=> $peoples]);
    }

    public function form()
    {
        return view('client.create');
    }

    public function update($id, Request $request) {
        
        $post = $request->all();

        $validators = Validator::make($post, [
            'name' => 'required | min: 4 | max: 100',
            'email' => [
                    'required',
                    'email',
                    'unique:people,email,'.$id
            ],
            'cpf' => ['required', 'size:11', 'min:11', 'max:11',
                'unique:people,cpf,'.$id
            ]
        ]);

        $model = People::find($id);
        
        if ($validators->fails()) {
            return redirect()->route('admin.client.index')->withErrors($validators->errors());
        }

        if (!$model) {
            return redirect()->route('admin.client.index')->with(['error'=>'Cliente não encontrado!']);
        }

        $model->name = $post['name'];
        $model->email = $post['email'];
        $model->cpf = $post['cpf'];

        $model->update();
        
        return redirect()->route('admin.client.index')->with(['success'=>'Cliente atualizado!']);

    }

    public function store(Request $request){
       
        $post = $request->all();

        $validators = Validator::make($post, [
            'name' => 'required | min: 4 | max: 100',
            'email' => 'required | email | unique:people,email',
            'cpf' => 'required | size:11 | min:11 | max:11 | unique:people,cpf',
        ]);
        
        if ($validators->fails()) {
            return redirect()->route('admin.client.form')->withErrors($validators->errors());
        }

        $save = People::create($post);
        
        return redirect()->route('admin.client.index')->with(['success'=>'Cliente criado!']);
    }

    public function destroy($id, Request $request) {

        $model = People::find($id);

        if (!$model) {

            return redirect()->route('admin.client.index')->with(['success'=>'Cliente não existe!']);

        }

        $model->delete();

        return redirect()->route('admin.client.index')->with(['success'=>'Cliente removido!']);

    }

    public function details($id){

        $people = People::find($id);

        if(!$people){
            return redirect()->route('admin.client.index')->with(['success'=>'Cliente não existe!']);
        }

        return view('client.details',[
            'people' => $people
        ]);
    }

    public function edit($id){

        $people = People::find($id);

        if(!$people){
            return redirect()->route('admin.client.index')->with(['success'=>'Cliente não existe!']);
        }

        return view('client.edit',[
            'people' => $people
        ]);
    }
}

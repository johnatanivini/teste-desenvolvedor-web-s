<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\People as ResourcesPeople;
use App\Models\People as ModelsPeople;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class People extends BaseController
{
    
    public function index(Request $request){

        $people = ModelsPeople::name(request('name'))
        ->email(request('email'))
        ->cpf(request('cpf'))
        ->order(request('order'),request('order_type'));

        $people = $people->paginate(20);

        return $this->sendResponse(new ResourcesPeople($people), 'Clientes carregados');
    }

    public function show($id):JsonResponse
    {

        $model = ModelsPeople::find($id);

        if (!$model) {
            return $this->sendError('Cliente não existe');
        }

        return $this->sendResponse(new ResourcesPeople($model), 'Clientes não encontrado!');

    }

    public function store(Request $request):JsonResponse
    {

        $post = $request->all();

        $validators = Validator::make($post, [
            'name' => 'required | min: 4 | max: 100',
            'email' => 'required | email | unique:people,email',
            'cpf' => 'required | size:11 | min:11 | max:11 | unique:people,cpf',
        ]);
        
        if ($validators->fails()) {
            return $this->sendError('Erro de validação',$validators->errors());
        }

        $model = ModelsPeople::create($post);
        
        return $this->sendResponse(new ResourcesPeople($model),'Cliente criado com sucesso!');

    }

    public function update($id, Request $request):JsonResponse
    {
       
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

        $model = ModelsPeople::find($id);
        
        if ($validators->fails()) {
            return $this->sendError('Erro de validação',$validators->errors());
        }

        if (!$model) {
            return $this->sendError('O cliente em específico não pode ser encontrado!');
        }

        $model->name = $post['name'];
        $model->email = $post['email'];
        $model->cpf = $post['cpf'];

        $model->update();
        
        return $this->sendResponse(new ResourcesPeople($model),'Cliente atualizado com sucesso!');

    }

    public function destroy($id):JsonResponse {

        $model = ModelsPeople::find($id);

        if (!$model) {
            return $this->sendError('O cliente não pode ser removido',['error' => 'O id não existe']);
        }

        $model->delete();

        return $this->sendResponse(new Collection(), 'Cliente removido!');
    }

}

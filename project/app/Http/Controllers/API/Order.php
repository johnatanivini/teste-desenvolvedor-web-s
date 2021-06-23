<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Order as ResourcesOrder;
use App\Models\Order as ModelsOrder;
use App\Models\OrderItens;
use App\Models\People;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class Order extends BaseController
{
    
    public function index(Request $request): JsonResponse
    {
        $model = ModelsOrder::date(request('date'))
        ->people(request('people_id'))
        ->status(request('status'))
        ->discount(request('discount'))
        ->filterId(request('id'))
        ->order(request('order'),request('order_type'))
        ->with('people')
        ->with('status')
        ->with('orders_itens')
        ->paginate(20);

        return $this->sendResponse(new ResourcesOrder($model), 'Pedidos carregados');
    }

    public function show($id):JsonResponse
    {

        $model = ModelsOrder::with('people')
        ->with('status')
        ->with('orders_itens')
        ->find($id);

        if (!$model) {
            return $this->sendError('Pedido não existe');
        }

        return $this->sendResponse(new ResourcesOrder($model), 'Pedidos não encontrado!');

    }

    public function store(Request $request): JsonResponse
    {

        $post = $request->all();

        $validators = Validator::make($post, [
            'date' => 'required',
            'order_itens' => 'array | min:1',
            'order_itens.*.quantity' => 'required | integer',
            'order_itens.*.unit_price' => "required | numeric",
            'status_id' => 'required | integer',
            'people_id'=>'required | integer',
            'discount' => 'numeric',
            'date'=> 'date'
        ]);
        
        if ($validators->fails()) {
            return $this->sendError('Erro de validação',$validators->errors());
        }
        
        $model = ModelsOrder::saveOrders($post);
        $model->with('orders_itens');

        return $this->sendResponse(new ResourcesOrder($model),"Pedido criado com sucesso! Pedido : {$model->id}");

    }

    public function destroy($id):JsonResponse {

        $model = ModelsOrder::find($id);

        if (!$model) {
            return $this->sendError('O pedido não pode ser removido',['error' => 'O id não existe']);
        }

        $model->delete();

        return $this->sendResponse(new Collection(), 'Pedido removido!');
    }

}

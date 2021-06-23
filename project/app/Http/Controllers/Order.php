<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order as ResourcesOrder;
use App\Models\Order as ModelsOrder;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Order extends Controller
{
    
    public function index(Request $request)
    {

        $model = ModelsOrder::date(request('date'))
        ->status(request('status'))
        ->filterId(request('id'))
        ->filterByCpf(request('cpf'))
        ->order(request('order'),request('order_type'))
        ->with('people')
        ->with('status')
        ->with('orders_itens')
        ->paginate(20);

        return view('order.index',['orders' => $model, 'status' => Status::all() ]);
    }

    public function form(Request $request)
    {

        return view('order.create',[]);
    }

    public function details($id)
    {
        $order = ModelsOrder::find($id);
        return view('order.details',['order'=>$order]);
    }

    public function store(Request $post)
    {
        $post->except('_token');

        $validators = Validator::make($post->all(), [
            'order_itens' => 'array | min:1',
            'order_itens.*.quantity' => 'required | integer',
            'order_itens.*.unit_price' => "required | numeric",
            'people_id'=>'required | integer',
            'discount' => 'numeric'
        ]);
        
        if ($validators->fails()) {
            return $this->sendError('Erro de validação', $validators->errors());
        }
    
        $model = ModelsOrder::saveOrders($post);
        $model->with('orders_itens');

        return $this->sendResponse(new ResourcesOrder($model), 'Pedido Criado!');

    }

    public function destroy($id)
    {
        $model = ModelsOrder::find($id);

        if (!$model) {
            return $this->sendError('O pedido não pode ser removido',['error' => 'O id não existe']);
        }

        $model->delete();

        $response = [
            'success' => true,
            'data' => [],
            'message' => 'Pedido removido!'
        ];

        return response()->json($response,200);

    }


}

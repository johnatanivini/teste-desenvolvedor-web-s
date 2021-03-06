<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Product as ResourcesProduct;
use App\Models\Product as ModelsProduct;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Product extends BaseController
{

    public function index(Request $request):JsonResponse
    {
       
        $products = ModelsProduct::name(request('name'))
                    ->description(request('description'))
                    ->unitPrice(request('unit_price'))
                    ->quantity(request('quantity'))
                    ->barcode(request('barcode'))
                    ->expiration(request('expiration'))
                    ->order(request('order'),request('order_type'));
                    

        $products = $products->paginate(20);
    

        /**
         * @todo Filtrar produtos
         */
        return $this->sendResponse(new ResourcesProduct($products),'Produtos recuperados com sucesso!');
    }

    public function store(Request $request):JsonResponse
    {

        $post = $request->all();

        $validators = Validator::make($post, [
            'name' => 'required',
            'quantity' => 'required | integer',
            'unit_price' => 'required | numeric',
            'barcode' => 'required | size: 13 | unique:products,barcode',
        ]);
        
        if ($validators->fails()) {
            return $this->sendError('Erro de validação',$validators->errors());
        }

        $product = ModelsProduct::create($post);
        
        return $this->sendResponse(new ResourcesProduct($product),'Produto criado com sucesso!');

    }

    public function update(Request $request, $id): JsonResponse
    {

        $post = $request->all();

        $validators = Validator::make($post, [
            'name' => 'required',
            'quantity' => 'required | integer',
            'unit_price' => 'required | numeric',
            'barcode' => 'unique:products,barcode,'.$id
        ]);
        
        if ($validators->fails()) {
            return $this->sendError('Erro de validação',$validators->errors());
        }

        $productModel = ModelsProduct::find($id);
    
        if (!$productModel) {
            return $this->sendError('O Produto não foi encontrado, não pode se atualizado',['error'=>'O id do produto não foi encontrado']);
        }

        $productModel->name = $post['name'];
        $productModel->quantity = $post['quantity'];
        $productModel->unit_price = $post['unit_price'];
        $productModel->barcode = $post['barcode'];
        $productModel->description = $post['description'] ?? null;
        $productModel->expiration = $post['expiration'];

        $productModel->update();
        
        return $this->sendResponse(new ResourcesProduct($productModel),'Produto atualizado com sucesso!');

    }

    public function destroy($id): JsonResponse
    {

        $product = ModelsProduct::find($id);

        if (!$product) {
            return $this->sendError('O produto não pode ser removido, pois não existe',['error' => 'O id não existe']);
        }

        $product->delete();

        return $this->sendResponse(new Collection(), 'Produto removido!');

    }

    public function show($id): JsonResponse
    {
        
        $product = ModelsProduct::find($id);

        if (!$product) {
            return $this->sendError('Produto não existe');
        }

        return $this->sendResponse(new ResourcesProduct($product), 'Produto encontrado!');
    }

}

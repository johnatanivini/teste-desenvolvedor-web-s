<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Product extends Controller
{
    
    public function index(Request $request){

        $products = ModelsProduct::name(request('name'))
        ->description(request('description'))
        ->unitPrice(request('unit_price'))
        ->quantity(request('quantity'))
        ->barcode(request('barcode'))
        ->expiration(request('expiration'))
        ->order(request('order'),request('order_type'));
        

        $products = $products->paginate(20);

        return view('product.index',['products' => $products]);
    }

    public function form()
    {
        return view('product.create');
    }

    public function update($id, Request $request) {
        
        $post = $request->all();

        $validators = Validator::make($post, [
            'name' => 'required',
            'quantity' => 'required | integer',
            'unit_price' => 'required | numeric',
            'barcode' => 'unique:products,barcode,'.$id
        ]);

        $productModel = ModelsProduct::find($id);
        
        if ($validators->fails()) {
            return redirect()->route('admin.product.edit')->withErrors($validators->errors());
        }

        if (!$productModel) {
            return redirect()->route('admin.product.index')->with(['error'=>'Produto não encontrado!']);
        }

        $productModel->name = $post['name'];
        $productModel->quantity = $post['quantity'];
        $productModel->unit_price = $post['unit_price'];
        $productModel->barcode = $post['barcode'];
        $productModel->description = $post['description'] ?? null;
        $productModel->expiration = $post['expiration'];

        $productModel->update();
        
        return redirect()->route('admin.product.index')->with(['success'=>'Produto atualizado!']);

    }

    public function store(Request $request){
       
        $post = $request->all();

        $validators = Validator::make($post, [
            'name' => 'required',
            'quantity' => 'required | integer',
            'unit_price' => 'required | numeric',
            'barcode' => 'required | size: 13 | unique:products,barcode',
        ]);
     
        if ($validators->fails()) {
            return redirect()->route('admin.product.form')->withErrors($validators->errors());
        }

        $product = ModelsProduct::create($post);
        
        return redirect()->route('admin.product.index')->with(['success'=>'Produto criado!']);
    }

    public function destroy($id, Request $request) {

        $model = ModelsProduct::find($id);

        if (!$model) {

            return redirect()->route('admin.product.index')->with(['success'=>'Produto não existe!']);

        }

        $model->delete();

        return redirect()->route('admin.product.index')->with(['success'=>'Produto removido!']);

    }

    public function details($id){

        $product = ModelsProduct::find($id);

        if(!$product){
            return redirect()->route('admin.product.index')->with(['success'=>'Produto não existe!']);
        }

        return view('product.details',[
            'product' => $product
        ]);
    }

    public function edit($id){

        $product = ModelsProduct::find($id);

        if(!$product){
            return redirect()->route('admin.product.index')->with(['success'=>'Produto não existe!']);
        }

        return view('product.edit',[
            'product' => $product
        ]);
    }


}

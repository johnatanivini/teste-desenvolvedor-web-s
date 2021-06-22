@extends('layouts.partials')

@section('partials')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Editar - <a href="{{route('admin.product.index')}}" class="btn btn-info">Voltar</a>
                </div>
                <div class="card-body">

                <form action="{{route('admin.product.update',['id'=> $product->id])}}" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                        
                        <div class="form-group">
                                    <label for="name">Produto</label>
                                    <input type="text" id="name" value="{{$product->name}}" name="name" required class="form-control">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                           
                                <div class="form-group">
                                    <label for="description">Descrição</label>
                                    <textarea id="description" value="{{$product->description}}" name="description" class="form-control"></textarea>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                          
                                <div class="form-group">
                                    <label for="quantity">Quantidade</label>
                                    <input type="number" min="0" value="{{$product->quantity}}" id="quantity" required name="quantity" class="form-control">
                                    @error('quantity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="unit_price">Preço Unitário</label>
                                    <input type="number" id="unit_price" value="@money($product->unit_price)" required name="unit_price" class="form-control">
                                    @error('unit_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="barcode">Código de barras</label>
                                    <input type="number" min="0" value="{{$product->barcode}}" id="barcode" required name="barcode" class="form-control">
                                    @error('barcode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="expiration">Data de vencimento</label>
                                    <input type="date" value="{{$product->expiration->format('Y-d-m')}}" id="expiration" name="expiration" class="form-control datepicker">
                                    @error('expiration')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                           
                           
                                <button type="submit" class="mt-4 btn btn-primary">Atualizar</button>
                            
                        </div>
                    </form>
               
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.partials')

@section('partials')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Cadastrar - <a href="{{route('admin.product.index')}}" class="btn btn-info">Voltar</a>
                </div>
                <div class="card-body">

                <form action="{{action('Product@store')}}" method="POST" autocomplete="off">
                                @csrf
                        
                                <div class="form-group">
                                    <label for="name">Produto</label>
                                    <input type="text" id="name"  name="name" required class="form-control">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                           
                                <div class="form-group">
                                    <label for="description">Descrição</label>
                                    <textarea id="description"  name="description" class="form-control"></textarea>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                          
                                <div class="form-group">
                                    <label for="quantity">Quantidade</label>
                                    <input type="number" min="0"  id="quantity" required name="quantity" class="form-control">
                                    @error('quantity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="unit_price">Preço Unitário</label>
                                    <input type="text" id="unit_price" regex="[0-9.]"  required name="unit_price" class="form-control">
                                    @error('unit_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="barcode">Código de barras</label>
                                    <input type="number" min="0"  id="barcode" required name="barcode" class="form-control">
                                    @error('barcode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="expiration">Data de vencimento</label>
                                    <input type="date"  id="expiration" name="expiration" class="form-control datepicker">
                                    @error('expiration')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                           
                                <button type="submit" class="mt-4 btn btn-primary">Salvar</button>
                            
                        </div>
                    </form>
               
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
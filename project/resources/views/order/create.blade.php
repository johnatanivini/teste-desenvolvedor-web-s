@extends('layouts.partials')

@section('partials')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Cadastrar Pedido - <a href="{{route('admin.order.index')}}" class="btn btn-info">Voltar</a>
                </div>
                <div class="card-body">

                <form action="{{action('Order@store')}}" method="POST" autocomplete="off">
                                @csrf
                    
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="cpf">CPF do Cliente</label>
                                            <input id="cpf" type="number" name="cpf" class="form-control" />
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="product_name">Produto</label>
                                            <input type="text" min="0"  id="product_name" name="barcode" class="form-control">
                                            @error('barcode')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                

                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="barcode">Código de barras</label>
                                            <input type="number" id="barcode" required name="barcode" class="form-control">
                                            @error('barcode')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="discount">Desconto</label>
                                            <input type="number" min="0"  id="discount" name="discount" class="form-control">
                                            @error('quantity')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" id="add_order_item" class="mt-4 btn btn-primary">Adicionar</button>
                                    </div>
                                </div>
                                
                                <div class="row">
                                
                                    <table class="table">
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Total</th>
                                        </tr>

                                        <tbody id="orders_itens">
                                                
                                        </tbody>

                                    </table>
                                   

                                </div>

                                

                                <button type="submit" class="mt-4 btn btn-primary">Salvar</button>
                    </form>
               
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
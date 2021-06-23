@extends('layouts.partials')

@section('partials')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Cadastrar Pedido - <a href="{{route('admin.order.index')}}" class="btn btn-info">Voltar</a>
                </div>
                <div class="card-body">

                <form action="{{action('Order@store')}}" id="salvar-pedido" method="POST" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="cpf">CPF do Cliente</label>
                                            <input id="cpf" data-route="{{route('admin.client.cpf')}}" type="number"  required class="form-control buscar-cpf" />
                                            <input id="people_id" name="people_id" type="hidden"  required class="form-control" />
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>                                

                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="barcode">Código de barras</label>
                                            <input type="number" id="barcode" required class="form-control">
                                            @error('barcode')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="quantity">Quantidade</label>
                                            <input type="number" min="0"  id="quantity" class="form-control">
                                            @error('quantity')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        <button type="button" data-route="{{route('admin.product.barcode')}}" id="add_order_item" class="mt-4 btn btn-primary">Adicionar</button>
                                    </div>
                                </div>
                                
                                <div class="row">
                                
                                    <table class="table">
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>

                                        <tbody id="orders_itens">
                                            
                                        </tbody>
                                    </table>
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

                                <button type="submit" id="btn-salvar-form-pedido" data-redirect="{{route('admin.order.index')}}" class="mt-4 btn btn-primary">Salvar</button>
                    </form>
               
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
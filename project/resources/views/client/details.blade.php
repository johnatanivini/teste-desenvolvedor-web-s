@extends('layouts.partials')

@section('partials')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Detalhes - <a href="{{route('admin.client.index')}}" class="btn btn-info">Voltar</a>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                   
                    <table class="table">
                        <tr>
                            <th colspan="3">Cliente</th>
                        </tr>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Cpf</th>
                        </tr>
                        <tr>
                            <td>{{$people->name}}</td>
                            <td>{{$people->email}}</td>
                            <td>{{$people->cpf}}</td>
                        </tr>
                    </table>
                    @if($people->orders)
                    <table class="table">
                    <tr>
                            <th colspan="3">Pedidos</th>
                        </tr>
                        <tr>
                            <td>

                            <table class="table">
                                        
                                        <tr>
                                            <th>Numero Pedido</th>
                                            <th>Data do pedido</th>
                                            <th>Desconto</th>
                                            <th>Total</th>
                                        </tr>
                                        
                                        @foreach($people->orders as $pedido)
                                            <tr>
                                                <td>{{$pedido->id}}</td>    
                                                <td>{{$pedido->date->format('d/m/Y')}}</td>    
                                                <td>{{$pedido->discount}}</td>   
                                                <td>{{$pedido->getDiscount(($pedido))->price}}</td>   
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="p-0">

                                                    <table class="table">
                                                    <tr>
                                                        <th colspan="4">Itens</th>
                                                    </tr>   
                                                    <tr>
                                                        <td>Produto</td>    
                                                        <td>Quantidade</td>    
                                                        <td>Preço</td>   
                                                    </tr>
                                                        @foreach($pedido->orders_itens as $item)
                                                            <tr>
                                                                <td>{{$item->product->name}}</td>    
                                                                <td>{{$item->quantity}}</td>    
                                                                <td>{{$item->unit_price}}</td>   
                                                            </tr>
                                                        @endforeach
                                                    </table>

                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                        
                                    </table>

                            </td>
                        </tr>
                                    
                    </table>
                    @endif

                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
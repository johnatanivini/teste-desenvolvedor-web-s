@extends('layouts.partials')

@section('partials')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Detalhes - <a href="{{route('admin.order.index')}}" class="btn btn-info">Voltar</a>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                   
                    <table class="table">
                        <tr>
                            <th colspan="3">Pedido</th>
                        </tr>
                        <tr>
                            <th>Pedido</th>
                            <th>Data</th>
                            <th>Desconto</th>
                            <th>Cliente</th>
                            <th>Situação</th>
                            <th>Valor</th>
                            <th>Com desconto</th>
                        </tr>
                        <tr>
                            
                            <td>{{$order->id}}</td>
                            <td>{{$order->date->format('d-m-Y')}}</td>
                            <td>{{$order->discount}}</td>
                            <td>{{$order->people?->name}}</td>
                            <td>{{$order->status?->name}}</td>
                            <td>@money($order->getDiscount($order)->price)</td>
                            <td>@money($order->getDiscount($order)->price_discount)</td>
                        </tr>
                    </table>

                    <table class="table">
                        <tr>
                            <th colspan="4">Itens</th>
                        </tr>
                        <tr>
                            <th>Item</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                        </tr>
                        @foreach($order->orders_itens as $item)
                        <tr>
                            
                            <td>{{$item->id}}</td>
                            <td>{{$item->product?->name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->unit_price}}</td>
                            
                        </tr>
                        @endforeach
                    </table>

                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.partials')

@section('partials')
<div class="row  row-cols-3 text-center ">
        <div class="col">
            <div class="card">
                <div class="card-header bg-warning">
                    Clientes
                </div>
                <div class="card-body">
                    <h3>{{$total_clients}}</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-light">Produtos</div>
                <div class="card-body">
                    <h3>{{$total_products}}</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header bg-success text-light">Pedidos</div>
                <div class="card-body">
                    <h3>{{$total_orders}}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection 

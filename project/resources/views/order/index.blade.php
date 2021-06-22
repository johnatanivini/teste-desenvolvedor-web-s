@extends('layouts.partials')

@section('partials')
    @include('layouts.alerts')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.order.index')}}" method="get" autocomplete="off">
                        @csrf
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_pedido">Numero Pedido</label>
                                    <input type="number"  id="numero_pedido" name="numero_pedido" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cpf">Cpf do Cliente</label>
                                    <input type="number"  id="cpf" name="cpf" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-12 text-right">
                                <button type="submit" class="mt-4 btn btn-primary">Filtrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    
                    Lista de Pedidos - <a href="{{route('admin.order.form')}}" class="btn btn-info">Cadastrar</a>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table class="table">

                    <table class="table">
                        <tr>
                            <th colspan="3">Pedidos</th>
                        </tr>
                        <tr>
                            <th>Pedido</th>
                            <th>Data</th>
                            <th>Desconto</th>
                            <th>Cliente</th>
                            <th>Situação</th>
                            <th>Valor</th>
                        </tr>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$$order->id}}</td>
                            <td>{{$order->date->format('d-m-Y')}}</td>
                            <td>{{$order->discount}}</td>
                            <td>{{$order->people->name}}</td>
                            <td>{{$order->status->name}}</td>
                            <td>@money($order->getDiscount($order)->price)</td>
                            <td>
                            <a type="button" class="btn btn-sm btn-info" href="{{route('admin.order.details',['id'=>$order->id])}}">
                                        Detalhes
                                        </a>

                                        <a type="button" class="btn btn-sm btn-primary" href="{{route('admin.order.edit',['id'=>$order->id])}}">
                                        Editar
                                        </a>

                                        <form style="display:inline-block" class="form-destroy" action="{{route('admin.order.destroy',['id' => $order->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                           <button class="btn btn-sm btn-danger">Remover</button>
                                        </form>
                            </td>
                        </tr>
                        @endforeach
                  
                        @if(!$products)
                            <tr>
                                <td>
                                    Nenhum registro encontrado
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.partials')

@section('partials')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Detalhes - <a href="{{route('admin.product.index')}}" class="btn btn-info">Voltar</a>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                   
                    <table class="table">
                        <tr>
                            <th colspan="3">Produto</th>
                        </tr>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Código de barras</th>
                            <th>Data de vencimento</th>
                            <th>Preço Unitário</th>
                            <th></th>
                        </tr>
                        <tr>
                            
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->barcode}}</td>
                            <td>{{$product->expiration->format('d-m-Y')}}</td>
                            <td>@money($product->unit_price)</td>
                        </tr>
                    </table>

                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
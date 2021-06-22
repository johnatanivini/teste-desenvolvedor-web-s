@extends('layouts.partials')

@section('partials')
    @include('layouts.alerts')
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.product.index')}}" method="get" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Produto</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="quantidade">Quantidade</label>
                                    <input type="text" id="quantidade" name="quantity" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="barcode">Codigo de barras</label>
                                    <input type="text" id="barcode" name="barcode" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="expiration">Data de vencimento</label>
                                    <input type="date datepicker"  id="expiration" name="expiration" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="unit_price">Preço unitário</label>
                                    <input type="text"  id="unit_price" name="unit_price" class="form-control">
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
                    
                    Lista de Produtos - <a href="{{route('admin.product.form')}}" class="btn btn-info">Cadastrar</a>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table class="table">

                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Código de barras</th>
                            <th>Data de vencimento</th>
                            <th>Valor unitário</th>
                            <th width="20%">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->barcode}}</td>
                                <td>{{$product->expiration->format('d-m-Y')}}</td>
                                <td>@money($product->unit_price)</td>
                                <td>
                                        <a type="button" class="btn btn-sm btn-info" href="{{route('admin.product.details',['id'=>$product->id])}}">
                                        Detalhes
                                        </a>

                                        <a type="button" class="btn btn-sm btn-primary" href="{{route('admin.product.edit',['id'=>$product->id])}}">
                                        Editar
                                        </a>

                                        <form style="display:inline-block" class="form-destroy" action="{{route('admin.product.destroy',['id' => $product->id])}}" method="POST">
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
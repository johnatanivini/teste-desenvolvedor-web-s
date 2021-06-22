@extends('layouts.partials')

@section('partials')
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.client.index')}}" method="get" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name">CPF</label>
                                    <input type="text" id="cpf" name="cpf" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <button type="submit" class="mt-4 btn btn-primary">Filtrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    
                    Lista de clientes - <a href="{{route('admin.client.form')}}" class="btn btn-info">Novo</a>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peoples as $people)
                                <tr>
                                    <th>{{$people->name}}</th>
                                    <th>{{$people->email}}</th>
                                    <th>

                                        <!-- Button trigger modal -->


                                        <a type="button" class="btn btn-sm btn-info" href="{{route('admin.client.details',['id'=>$people->id])}}">
                                        Detalhes
                                        </a>

                                        <a type="button" class="btn btn-sm btn-primary" href="{{route('admin.client.edit',['id'=>$people->id])}}">
                                        Editar
                                        </a>

                                        <form style="display:inline-block" action="{{route('admin.client.destroy',['id' => $people->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                           <button class="btn btn-sm btn-danger">Remover</button>
                                        </form>

                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $peoples->links() }}
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.partials')

@section('partials')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    
                    Lista de clientes - <a href="{{route(client.create)}}" class="btn btn-info">Novo</a>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peoples as $people)
                                <tr>
                                    <th>{{$people->name}}</th>
                                    <th>{{$people->email}}</th>
                                    <th></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
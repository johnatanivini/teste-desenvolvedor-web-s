@extends('layouts.partials')

@section('partials')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Cadastrar - <a href="{{route('admin.client.index')}}" class="btn btn-info">Voltar</a>
                </div>
                <div class="card-body">

                <form action="{{route('admin.client.update',['id'=> $people->id])}}" method="POST" autocomplete="off">
                        @method('PUT')
                        @csrf
                        
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" value="{{$people->name}}" id="name" name="name" class="form-control">
                                </div>
                           
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email"  value="{{$people->email}}" name="email" class="form-control">
                                </div>
                          
                                <div class="form-group">
                                    <label for="name">CPF</label>
                                    <input type="text" id="cpf" name="cpf"  value="{{$people->cpf}}" class="form-control">
                                </div>
                           
                                <button type="submit" class="mt-4 btn btn-primary">Atualizar</button>
                            
                        </div>
                    </form>
               
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
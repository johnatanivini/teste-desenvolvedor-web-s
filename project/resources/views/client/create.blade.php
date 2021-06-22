@extends('layouts.partials')

@section('partials')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Cadastrar - <a href="{{route('admin.client.index')}}" class="btn btn-info">Voltar</a>
                </div>
                <div class="card-body">

                <form action="{{action('Client@store')}}" method="POST" autocomplete="off">
                                @csrf
                        
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                           
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                          
                                <div class="form-group">
                                    <label for="name">CPF</label>
                                    <input type="text" id="cpf" name="cpf" class="form-control">
                                    @error('cpf')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                           
                                <button type="submit" class="mt-4 btn btn-primary">Cadastrar</button>
                            
                        </div>
                    </form>
               
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    @include('layouts.alerts')
    @yield('partials')
</div>
@endsection
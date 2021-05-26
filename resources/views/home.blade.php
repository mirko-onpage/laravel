@extends('layout')
@section('content')
    <h1>Home</h1>

    Abbiamo {{ Data\Varianti::count() }} varianti

    @foreach (Data\Varianti::get() as $var)
        <div>
            <a href="/varianti/{{ $var->val('nome_lastra') }}">
                <b>{{ $var->val('nome_lastra') }}</b>
                {{ $var->val('nome_colore') }}
            </a>
        </div>
    @endforeach

@endsection
{{-- 
@section('sidebar')
    custom sidebar
@endsection --}}
@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Resultado do Sorteio</h1>

    <ul class="list-group">
        @foreach($results as $result)
            <li class="list-group-item">{{ $result }}</li>
        @endforeach
    </ul>

    <a href="{{ route('people.index') }}" class="btn btn-primary mt-4">Voltar à lista de pessoas</a>
@endsection
    
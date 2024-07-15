@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Lista do Amigo Secreto</h1>

    <div class="d-flex justify-content-between mb-4">
        <form action="{{ route('people.index') }}" method="GET" class="form-inline">
            <input type="text" name="search" class="form-control mr-2" placeholder="Buscar por nome ou email">
            <button type="submit" class="btn btn-primary mr-2"><strong>Buscar</strong></button>
        </form>
        <div>
            <a href="{{ route('people.create') }}" class="btn btn-success mr-2"><strong>Cadastrar Pessoa</strong></a>
            <a href="{{ route('people.draw') }}" class="btn btn-primary"> <strong> Realizar Sorteio</strong></a>
        </div>
    </div>

    @if($people->count())
        <ul class="list-group">
            @foreach($people as $person)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $person->name }} ({{ $person->email }})
                    <span>
                        <a href="{{ route('people.edit', $person) }}" class="btn btn-warning btn-sm mr-2"><strong>Editar</strong></a>
                        <form action="{{ route('people.destroy', $person) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar?')"><strong>Deletar</strong></button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    @else
        <p>Nenhuma pessoa encontrada.</p>
    @endif
@endsection

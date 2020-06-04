@extends('layouts.app')


@section('content')
    <h1>Criar Categoria</h1>
    <form action="{{route('admin.categories.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">

            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar Categoria</button>
        </div>
    </form>
@endsection
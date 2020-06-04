@extends('layouts.app')


@section('content')
    <h1>Atualizar Categoria</h1>
    <form action="{{route('admin.categories.update', ['category' => $category->id])}}" method="post">
        @csrf
        @method("PUT")

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="@error('name') {{ old('name') }} @else {{ $category->name }} @enderror">

            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ $category->description }}">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Atualizar Categoria</button>
        </div>
    </form>
@endsection
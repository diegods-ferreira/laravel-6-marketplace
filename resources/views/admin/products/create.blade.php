@extends('layouts.app')

@section('content')
    <h1 class="display-4">Criar Produto</h1>

    <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="description">Descrição</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description') }}">
            @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div class="form-group">
        
        <div class="form-group">
            <label for="body">Conteúdo</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" id="" cols="30" rows="10">{{ old('body') }}</textarea>
            @error('body')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="price">Preço</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price') }}">
            @error('price')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="categories">Categorias</label>
            <select name="categories[]" id="categories" class="form-control" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="photos">Fotos do Produto</label>
            <input type="file" name="photos[]" id="photos" class="form-control-file @error('photos.*') is-invalid @enderror" multiple>
            @error('photos.*')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <div>
            <button class="btn btn-lg btn-success" type="submit">Criar Produto</button>
        </div>
    </form>
@endsection
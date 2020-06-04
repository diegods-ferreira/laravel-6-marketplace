@extends('layouts.app')

@section('content')
    <h1 class="display-4">Atualizar Produto</h1>

    <form action="{{route('admin.products.update', array('product' => $product->id))}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="@error('name') {{ old('name') }} @else {{ $product->name }} @enderror">
            @error('name')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="description">Descrição</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="@error('description') {{ old('description') }} @else {{ $product->description }} @enderror">
            @error('description')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div class="form-group">
        
        <div class="form-group">
            <label for="body">Conteúdo</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" id="" cols="30" rows="10">@error('body') {{ old('body') }} @else {{ $product->body }} @enderror</textarea>
            @error('body')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="price">Preço</label>
            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="@error('price') {{ old('price') }} @else {{ $product->price }} @enderror">
            @error('price')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="categories">Categorias</label>
            <select name="categories[]" id="categories" class="form-control" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($product->categories->contains($category)) selected @endif>{{ $category->name }}</option>
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
            <button class="btn btn-lg btn-success" type="submit">Atualizar Produto</button>
        </div>
    </form>

    <hr>

    <div class="row">
        @foreach ($product->photos as $photo)
            <div class="col-3">
                <img src="{{ asset('storage/' . $photo->image) }}" alt="" class="img-fluid">
                <form action="{{ route('admin.photo.remove') }}" method="post">
                    @csrf
                    <input type="hidden" name="photoName" value="{{ $photo->image }}">
                    <button type="submit" class="btn btn-sm btn-danger">&times;</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
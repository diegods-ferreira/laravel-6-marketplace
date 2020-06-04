@extends('layouts.app')

@section('content')
    <h1 class="display-4">Criar Loja</h1>

    <form action="{{route('admin.stores.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Loja</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="description">Descrição</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description') }}">
            @error('description')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div class="form-group">
        
        <div class="form-group">
            <label for="phone">Telefone</label>
            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone') }}">
            @error('phone')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="mobile_phone">Celular</label>
            <input class="form-control @error('mobile_phone') is-invalid @enderror" type="text" name="mobile_phone" id="mobile_phone" value="{{ old('mobile_phone') }}">
            @error('mobile_phone')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="logo">Logo da Loja</label>
            <input type="file" name="logo" id="photos" class="form-control-file @error('logo') is-invalid @enderror">
            @error('logo')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <div>
            <button class="btn btn-lg btn-success" type="submit">Criar Loja</button>
        </div>
    </form>
@endsection
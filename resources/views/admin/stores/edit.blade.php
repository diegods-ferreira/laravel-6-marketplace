@extends('layouts.app')

@section('content')
    <h1 class="display-4">Criar Loja</h1>

    <form action="{{route('admin.stores.update', array('store' => $store->id))}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="form-group">
            <label for="name">Loja</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="@error('name') {{ old('name') }} @else {{ $store->name }} @enderror">
            @error('name')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="description">Descrição</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="@error('description') {{ old('description') }} @else {{ $store->description }} @enderror">
            @error('description')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div class="form-group">
        
        <div class="form-group">
            <label for="phone">Telefone</label>
            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="@error('phone') {{ old('phone') }} @else {{ $store->phone }} @enderror">
            @error('phone')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="mobile_phone">Celular</label>
            <input class="form-control @error('mobile_phone') is-invalid @enderror" type="text" name="mobile_phone" id="mobile_phone" value="@error('mobile_phone') {{ old('mobile_phone') }} @else {{ $store->mobile_phone }} @enderror">
            @error('mobile_phone')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <p>
                <img src="{{ asset('storage/' . $store->logo) }}" alt="" class="img-fluid">
            </p>
            <label for="logo">Logo da Loja</label>
            <input type="file" name="logo" id="photos" class="form-control-file @error('logo') is-invalid @enderror">
            @error('logo')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <div>
            <button class="btn btn-lg btn-success" type="submit">Atualizar Loja</button>
        </div>
    </form>
@endsection
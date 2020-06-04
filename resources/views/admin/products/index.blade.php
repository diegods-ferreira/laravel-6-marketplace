@extends('layouts.app')

@section('content')
    <a href="{{route('admin.products.create')}}" class="btn btn-lg btn-success mb-5">Criar Produto</a>
    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @if($products)
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
                        <td>{{$product->store->name}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('admin.products.edit', array('product' => $product->id))}}" class="btn btn-sm btn-info">Editar</a>
                                <form action="{{route('admin.products.destroy', array('product' => $product->id))}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    @if($products)
        {{$products->links()}}
    @endif
@endsection
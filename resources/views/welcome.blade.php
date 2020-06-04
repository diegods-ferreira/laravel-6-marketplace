@extends('layouts.front')

@section('content')

    <div class="row">
        @foreach ($products as $key => $product)
            <div class="col-4 mb-3">
                <div class="card">
                    @if ($product->photos->count())
                        <img src="{{asset('storage/' . $product->photos->first()->image)}}" class="card-img-top" alt="">
                    @else
                        <img src="{{asset('assets/img/no-photo.jpg')}}" class="card-img-top" alt="">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">{{$product->name}}</h3>
                        <p class="card-text">{{$product->description}}</p>
                        <h4>R$ {{number_format($product->price, 2, ',', '.')}}</h4>
                        <a href="{{route('product.single', ['slug' => $product->slug])}}" class="btn btn-sm btn-info">
                            Ver produto
                        </a>
                    </div>
                </div>
            </div>

            @if (($key + 1) % 3 == 0)
                </div><div class="row">
            @endif
        @endforeach
    </div>

@endsection
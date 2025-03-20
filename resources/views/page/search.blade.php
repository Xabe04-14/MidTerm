@extends('master')

@section('content')

    <div class="container d-flex flex-wrap gap-5 justify-content-between">
        @if($products->count() > 0)
            @foreach ($products as $product)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('source/image/product/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Giá: {{ number_format($product->unit_price, 0, ',', '.') }} VNĐ</p>
                        <a href="{{ url('/product/' . $product->id) }}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            @endforeach
        @else
            <p>Không tìm thấy sản phẩm nào!</p>
        @endif
    </div>

    <div class="d-flex justify-content-center mt-5">
    {{ $products->appends(['search' => request('search')])->links() }}

    </div>
@endsection

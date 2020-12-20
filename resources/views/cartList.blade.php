@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            <a class="btn btn-success" href="#">Order Now</a> <br> <br>
            @foreach($products as $item)
            <div class="row searched-item cart-list-devider">
                <div class="col-sm-3">
                    <a href="detail/{{ $item->id }}">
                        <img class="trending-img" src="{{ $item->gallery }}">
                    </a>
                </div>
                <div class="col-sm-4">
                    <h2>{{$item->name}}</h2>
                    <h5>{{$item->description}}</h5>
                </div>
                <div class="col-sm-3">
                    <a href="#" class="btn btn-warning">Remove to Cart</a>
                </div>
            </div>
            @endforeach
        </div>
        <a class="btn btn-success" href="#">Order Now</a> <br> <br>

    </div>
</div>
@endsection
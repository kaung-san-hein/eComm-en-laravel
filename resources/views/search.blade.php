@extends('master')

@section('content')

<div class="custom-product">
    <div class="row">
        <div class="col-sm-4">
            <a href="#">Filter</a>
        </div>
        <div class="col-sm-4">
            <div class="trending-wrapper">
                <h4>Result for Products</h4>
                @foreach ($products as $item)
                <a href="detail/{{ $item['id'] }}">
                    <div class="searched-item">
                        <img class="trending-img" src="{{$item['gallery']}}">
                        <div class="">
                            <h2>{{$item['name']}}</h2>
                            <h5>{{$item['description']}}</h5>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
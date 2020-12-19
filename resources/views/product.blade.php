@extends('master')

@section('content')

<div class="custom-product">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach ($products as $item)
            <div class="carousel-item {{$item['id'] == 1 ? 'active' : ''}}">
                <a href="detail/{{ $item['id'] }}">
                    <img class="slider-img" src="{{$item['gallery']}}">
                    <div class="carousel-caption d-none d-md-block slider-text">
                        <h3>{{$item['name']}}</h3>
                        <p>{{$item['description']}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <!-- Left and right controls -->
        <a style="background-color: #35443585 !important;" class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a style="background-color: #35443585 !important;" class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="trending-wrapper">
        <h1>Trending Products</h1>
        @foreach ($products as $item)
        <a href="detail/{{ $item['id'] }}">
            <div class="trending-item">
                <img class="trending-img" src="{{$item['gallery']}}">
                <div class="">
                    <h3>{{$item['name']}}</h3>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>

@endsection
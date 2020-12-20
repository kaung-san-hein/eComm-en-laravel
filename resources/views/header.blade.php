<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;

$total = 0;

if (Session::get('user')) {
    $total = ProductController::cartItem();
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">E-Comm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Order</a>
                </li>
            </ul>
            <form action="/search" class="form-inline my-2 my-lg-0 mr-auto">
                <input class="form-control mr-sm-2 search-box" name="query" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/cart-list">Cart({{ $total }})</a>
                </li>
                @if(Session::get('user'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Session::get('user')['name'] }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
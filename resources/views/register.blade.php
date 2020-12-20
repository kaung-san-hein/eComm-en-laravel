@extends('master')

@section('content')

<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 offset-4">
            <form action="/register" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

@endsection
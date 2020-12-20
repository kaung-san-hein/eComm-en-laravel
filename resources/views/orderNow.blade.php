@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <table class="table">
            <tbody>
                <tr>
                    <td>Amount</td>
                    <td>$ {{ $total }}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$ 0</td>
                </tr>
                <tr>
                    <td>Delivery</td>
                    <td>$ 10</td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>{{ $total + 10 }}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <form action="/order-place" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="address" id="address" class="form-control" placeholder="Enter your address"></textarea>
                </div>
                <div class="form-group">
                    <label for="payment">Payment Method</label><br><br>
                    <input type="radio" value="KPZ" name="payment"> <span>KPZ Pay</span><br><br>
                    <input type="radio" value="Wave" name="payment"> <span>Wave Pay</span><br><br>
                    <input type="radio" value="Delivery" name="payment"> <span>Delivery Pay</span><br><br>
                </div>
                <button type="submit" class="btn btn-success">Order Now</button>
            </form>
        </div>
    </div>
</div>
@endsection
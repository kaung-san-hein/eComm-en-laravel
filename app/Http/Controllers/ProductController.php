<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }

    public function show($id)
    {
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }

    public function search(Request $request)
    {
        $data = Product::where('name', 'like', '%' . $request->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }

    public function addToCart(Request $request)
    {
        if ($request->session()->has('user')) {
            $cart = new Cart();
            $cart->product_id = $request->input('product_id');
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->save();

            return redirect('/');
        }
        return redirect('/login');
    }

    static public function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    public function cartList()
    {
        $userId = Session::get('user')['id'];
        $products = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', '=', $userId)
            ->select('products.*', 'carts.id as cart_id')
            ->get();

        return view('cartList', ['products' => $products]);
    }

    public function removeCart($id)
    {
        Cart::destroy($id);

        return redirect()->back();
    }

    public function orderNow()
    {
        $userId = Session::get('user')['id'];
        $total = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', '=', $userId)
            ->sum('products.price');

        return view('orderNow', ['total' => $total]);
    }

    public function orderPlace(Request $request)
    {
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();

        foreach ($allCart as $cart) {
            $order = new Order();
            $order->product_id = $cart['product_id'];
            $order->user_id = $userId;
            $order->status = "Pending";
            $order->payment_method = $request->input('payment');
            $order->payment_status = "Pending";
            $order->address = $request->input('address');
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }

        return redirect('/');
    }

    public function myOrders()
    {
        $userId = Session::get('user')['id'];
        $order = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', '=', $userId)
            ->get();

        return view('myOrders', ['orders' => $order]);
    }
}

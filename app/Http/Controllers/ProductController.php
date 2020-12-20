<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
            ->select('products.*')
            ->get();

        return view('cartList', ['products' => $products]);
    }
}

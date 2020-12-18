<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where(['email' => $request->input('email')])->first();
        if ($user && Hash::check($request->input('password'), $user->password)) {
            $request->session()->put('user', $user);
            return redirect('/');
        } else {
            return "Invalid Credential!";
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SignInController extends Controller
{
    public function create()
    {
        return view('sign-in.create');
    }

    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user_exists = User::whereRaw("email = '${email}'")->whereRaw("password = '${password}'")->exists();

        if ($user_exists) {
            return "ログインに成功しました。";
        } else {
            return "ログインに失敗しました。";
        }
        
    }
}

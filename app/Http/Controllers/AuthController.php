<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponser;

    public function login(Request $request) {
        $attr = $request->validate([
            'user_id' => ['required'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Authentication fail', 401);
        }

        return $this->success(Auth::user());
    }

    public function logout() {
        Auth::guard('web')->logout();
        return $this->success(null);
    }

}

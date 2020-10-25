<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Exception;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Facade\FlareClient\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;



class LoginController extends Controller
{
    public $loginAfterSignUp = true;

    public function login(Request $request) {
    $input = $request->only('username', 'password');
    $token = null;

    if (!$token = JWTAuth::attempt($input)) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid Email or Password',
        ], 401);
    }

    return response()->json([
        'success' => true,
        'token' => $token,
    ]);

    }

    public function logout(Request $request) {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}

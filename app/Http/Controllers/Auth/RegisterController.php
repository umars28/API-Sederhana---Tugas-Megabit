<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Exception;
use PhpParser\Node\Stmt\Catch_;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Facade\FlareClient\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;

class RegisterController extends Controller
{

    public function register(Request $request) {
        try {
            $daftar = $request->all();
            $daftar['password'] = bcrypt($request->password);
            $data = User::create($daftar);
            if ($data) {
                return response()->json([
                    'success' => true,
                    'data' => $daftar
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Whoops'
            ],200);
        }
    }
}

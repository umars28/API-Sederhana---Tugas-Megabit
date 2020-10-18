<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;


class LoginController extends Controller
{
    public function login() {
        return "Halaman login";
    }

    public function post(Request $request) {
        // $login = [
        //     'username' => $request->username,
        //     'password' => $request->password
        // ];
        // if(auth()->attempt($login)) {
        //     $user = User::whereUsername($login['username'])->first();
            // $allUser = User::where('username', '!=', $login['username'])->get();
            // return [
            //     'Akun anda' => 'Berhasil login sebagai '.$user->role,
            //     'id' => $user->id,
            //     'username' => $user->username,
            //     'fullname' => $user->fullname,
            //     'birth_of_date' => $user->birth_of_date,
            //     'birth_of_place' => $user->birth_of_place,
            //     'gender' => $user->gender == 'L' ? 'Laki-laki' : 'Perempuan',
            //     'role' => $user->role
            // ];
            // return User::where('username', '!=', $login['username'])->get();
            $login = [
                'username' => $request->username,
                'password' => $request->password
            ];
            if(auth()->attempt($login)) {
                $data = [
                    'Akun yang sedang login' => User::whereUsername($login['username'])->first(),
                    'List users' => User::where('username', '!=', $login['username'])->get()
                ];
    
                return $data;

        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Login Failed'
            ], 200);
        }
        
    }
}

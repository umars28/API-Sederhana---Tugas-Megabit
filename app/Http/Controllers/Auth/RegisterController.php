<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function register() {
        return "ini adalah halaman register";
    }

    public function save(Request $request) {
        $user = new User();
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->password = bcrypt($request->password);
        $user->birth_of_date = $request->birth_of_date;
        $user->birth_of_place = $request->birth_of_place;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->save();
        return "Data user berhasil ditambahkan";
    }
}

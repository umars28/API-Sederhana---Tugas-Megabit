<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Exception;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Illuminate\Support\Facades\Hash;
use Facade\FlareClient\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;

class PostController extends Controller
{
    public function index() {
        $listPost = Post::with('user')->get();
        return response()->json([
            'data' => $listPost
        ], 200);
    }

    public function create(Request $request) {
        try {
            $post = new Post;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->users_id = Auth::user()->id;
            $post->save();
            return response()->json(['success' => 'Data berhasil ditambah'], 200);
        } catch (Exception $e) {
            return response()->json(['Failed' => 'Data gagal ditambah'], 401);
        }
    }

    public function update(Request $request, $id) {
        $auth = Auth()->user();
        $post = Post::find($id);
        if($auth->role == "Admin" || $post->user_id == $auth->id){
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();
            return response()->json(['success' => true], 200);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Bukan post anda'
            ], 200);
        }
    }

    public function delete($id) {
        $auth = Auth()->user();
        $post = Post::find($id);
        if($auth->role == "Admin" || $post->user_id == $auth->id){
            $post->delete();
            return response()->json([
                'success' => true,
                'data' => 'Sukses dihapus'
            ], 200);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Bukan post anda'
            ], 200);
        }

    }
}

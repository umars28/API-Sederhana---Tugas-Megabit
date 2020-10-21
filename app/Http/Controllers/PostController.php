<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        return Post::all();
    }

    public function create(Request $request) {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->users_id = Auth()->user()->id;
        $post->save();
        Return "Data berhasil ditambahkan";
    }

    public function update(Request $request, $id) {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->users_id = Auth()->user()->id;
        $post->save();

        Return "Data berhasil diupdate";
    }

    public function delete($id) {
        $post = Post::find($id);
        $post->delete();

        Return "Data berhasil dihapus";
    }
}

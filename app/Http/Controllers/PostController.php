<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(10);

        return view('dashboard', compact('user', 'posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'imagen' => 'required',
        ]);

        /*        Post::create([
                    'titulo' => $request->title,
                    'descripcion' => $request->description,
                    'imagen' => $request->imagen,
                    'user_id' => auth()->user()->id
                ]);

        */

        /*
        $post = new Post();
        $post->titulo = $request->title;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->save();
         * */

        $request->user()->posts()->create([
            'titulo' => $request->title,
            'descripcion' => $request->description,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('posts.index', auth()->user()->username);
    }

}

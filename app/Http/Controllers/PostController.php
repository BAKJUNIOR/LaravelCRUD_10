<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Afficher une liste de la ressource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index',compact('posts'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Afficher le formulaire de création d'une nouvelle ressource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * stocker une ressource nouvellement créée dans le stockage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')->with('success','Post created successfully.');
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * afficher le formulaire de modification de la ressource spécifiée.
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }


    /**
     * Mettez à jour la ressource spécifiée dans le stockage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }


    /**
     * Supprimez la ressource spécifiée du stockage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }
}

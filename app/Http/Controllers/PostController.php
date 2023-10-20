<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index () 
    {
        $posts = Post::where(['ativo' => 'Sim'])->get();
        return view('posts.index',compact('posts'));
    }

    public function create ()
    {
        return view('posts.create', ['categorias' => Categoria::all()]);
    }

    public function store(Request $request, Post $Post)
    {
        $Post->fill($request->all());
        $Post->imagem = Post::uploadImagem($request);
        $Post->save();
        return redirect()->route('posts.index');
    }

    public function show($id)
    {   
        return view('posts.show',['Post' => Post::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('posts.edit',['Post' => Post::findOrFail($id)]);
    }

    public function update($id, Request $request)
    {
        $NovoPost = [
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'ativo' => $request->ativo,
            'imagem' => Post::uploadImagem($request)
        ];

        if(!isset($request->imagem)) {
            $NovoPost['imagem'] = Post::findOrFail($id)->imagem;
        }

        Post::findOrFail($id)->update($NovoPost);

        return redirect()->route('dashboard.posts');
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('dashboard.posts');
    }

    public function dashboard()
    {
        return view('posts.dashboard',['posts' => Post::all()]);
    }
}

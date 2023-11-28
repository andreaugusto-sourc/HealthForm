<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index (Request $request) 
    {
        $categorias = Categoria::pegarCategorias();

        if (isset($request->categoria_id) && $request->categoria_id != "Todas") {
            $categoria_id = $request->categoria_id;
            $posts = Post::pegarPostsAtivosCategoria($categoria_id);

            return view('posts.index', compact('posts','categorias','categoria_id'));
        }

        $posts = Post::pegarPostsAtivos();

        return view('posts.index', compact('posts','categorias'));
    }

    public function create ()
    {
        return view('posts.create', ['categorias' => Categoria::pegarCategorias()]);
    }

    public function store(Request $request, Post $Post)
    {
        $Post->fill($request->all());
        $Post->imagem = Post::uploadImagem($request);
        Post::salvandoPost($Post);

        return redirect()->route('posts.index');
    }

    public function show($id)
    {   
        return view('posts.show', ['Post' => Post::pegarPost($id)]);
    }

    public function edit($id)
    {
        return view('posts.edit', ['Post' => Post::pegarPost($id)]);
    }

    public function update($id, Request $request)
    {
        $Post = Post::pegarPost($id);

        $NovoPost = [
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'ativo' => $request->ativo,
            'imagem' => Post::uploadImagem($request)
        ];

        if(!isset($request->imagem)) {
            $NovoPost['imagem'] = $Post->imagem;
        }

        Post::atualizandoPost($Post, $NovoPost);

        return redirect()->route('dashboard.posts');
    }

    public function destroy($id)
    {
        Post::removendoPost($id);

        return redirect()->route('dashboard.posts');
    }

    public function dashboard()
    {
        return view('posts.dashboard', ['posts' => Post::pegarPosts()]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        return view('posts.create');
    }

    public function store(Request $request, Post $Post)
    {
        $Post->fill($request->all());
        if (isset($request->imagem)){
             /* pegando a imagem com o name */
            $requestImage = $request->imagem;
             /* pegando a extensao dessa imagem */
             $extensao = $requestImage->extension();
             /* criptografando o caminho da imagem */
             $imagem = md5($requestImage->getClientOriginalName() . strtotime('now') . $extensao);
             /* movendo a imagem para a pasta images/upload com o seu novo caminho */
             $requestImage->move(public_path('images/uploads/'), $imagem);
             /* inserindo a imagem no post*/
             $Post->imagem = $imagem;
        }
        $Post->save();
        return redirect()->route('posts.index');
    }

    public function show($id)
    {   
        return view('posts.show',['Post' => Post::findOrFail($id)]);
    }
}

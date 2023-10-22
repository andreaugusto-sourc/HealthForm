<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    Protected $fillable = ['titulo','conteudo','ativo','imagem','categoria_id'];

    public static function salvandoPost($post)
    {
        $post->save();
    }

    public static function atualizandoPost($post, $NovoPost)
    {
        $post->update($NovoPost);
    }

    public static function removendoPost($post_id)
    {
        Post::findOrFail($post_id)->delete();
    }

    public static function pegarPostsAtivosCategoria($categoria_id)
    {
        return Post::where([['categoria_id', $categoria_id],['ativo','Sim']])->get();
    }

    public static function pegarPostsAtivos()
    {
        return Post::where(['ativo' => 'Sim'])->get();
    }

    public static function pegarPosts()
    {
        return Post::all();
    }

    public static function pegarPost($post_id)
    {
        return Post::findOrFail($post_id);
    }

    public static function uploadImagem($request) 
    {
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
            return $imagem;
       }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    Protected $fillable = ['titulo','conteudo','ativo','imagem','categoria_id'];

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

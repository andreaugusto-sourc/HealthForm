<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Questionario;
use App\Models\Pergunta;
use App\Models\Resposta;
use App\Models\User;
class RespostaController extends Controller
{
    public function store(Request $request)
    {   
        $user_id = Auth::user()->id;
        
        foreach ($request->texto as $key => $texto) {
            Resposta::salvandoResposta($user_id, $request->pergunta_id[$key], $texto);
        }

        return redirect()->route('questionarios.index');
    }

    public function show(string $id)
    {
        $questionario = Questionario::pegarQuestionarioPerguntasRespostas($id);
        $users = User::pegarUsuariosExcetoAdmin();

        return view('respostas.show', compact('questionario','users'));
    }
}

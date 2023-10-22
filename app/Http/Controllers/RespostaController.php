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
            Resposta::salvandoResposta($request->questionario_id, $user_id, $request->pergunta_id[$key], $texto);
        }

        return redirect()->route('questionarios.index');
    }

    public function show(string $id)
    {
        $Questionario = Questionario::pegarQuestionario($id);
        $perguntas = Pergunta::pegarPerguntasQuestionario($Questionario->id);
        $respostas = Resposta::pegarRespostas();
        $users = User::pegarUsuariosExcetoAdmin();

        return view('respostas.show', compact('Questionario','perguntas','respostas','users'));
    }
}

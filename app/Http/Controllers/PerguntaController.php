<?php

namespace App\Http\Controllers;

use App\Models\Questionario;
use App\Models\Pergunta;
use App\Enums\TiposPergunta;
use Illuminate\Http\Request;

class PerguntaController extends Controller
{
    public function create(Request $request)
    {   
        $tiposPergunta = TiposPergunta::cases();
        if(request("adicionarPergunta")) {
            $idQuestionario = request("adicionarPergunta");
            $request->session()->put('idQuestionario', $idQuestionario);
        }

        return view('perguntas.create',compact('tiposPergunta'));
    }

    public function store(Request $request, Pergunta $pergunta)
    {
        $pergunta->fill($request->all());
        //remove se o usuário colocar '?' no final do texto da pergunta
        $pergunta->texto = str_replace('?','', $pergunta->texto);

        $questionario_id = $request->session()->get('idQuestionario');
        Pergunta::salvandoPergunta($pergunta, $questionario_id);

        return redirect()->route('perguntas.create');
    }

    public function edit(string $id)
    {
        return view('perguntas.edit', ['pergunta' => Pergunta::pegarPergunta($id)]);
    }

    public function update(Request $request, string $id)
    {
        Pergunta::atualizandoPergunta($id, $request->all());

        return redirect()->route('questionarios.index');
    }

    public function destroy(string $id)
    {
        Pergunta::removendoPergunta($id);

        return redirect()->route('questionarios.index');
    }

    public function dashboard(string $id)
    {
        $questionario = Questionario::pegarQuestionarioPerguntas($id);

        return view('perguntas.dashboard', compact('questionario'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Questionario;
use App\Models\Pergunta;
use App\Models\Resposta;
use App\Enums\TiposPergunta;
use Illuminate\Http\Request;

class PerguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function create(Request $request)
    {   
        $tiposPergunta = TiposPergunta::cases();
        if(request("adicionarPergunta")) {
            $idQuestionario = request("adicionarPergunta");
            $request->session()->put('idQuestionario', $idQuestionario);
        }
        return view('perguntas.create',compact('tiposPergunta'));
    }

    public function store(Request $request, Pergunta $Pergunta)
    {
        $Pergunta->fill($request->all());
        $Pergunta->questionario_id = $request->session()->get('idQuestionario');
        $Pergunta->save();
        return redirect()->route('perguntas.create');
    }

    public function edit(string $id)
    {
        return view('perguntas.edit',['Pergunta' => Pergunta::findOrFail($id)]);
    }

    public function update(Request $request, string $id)
    {
        Pergunta::findOrFail($id)->update($request->all());
        return redirect()->route('questionarios.index');
    }

    public function destroy(string $id)
    {
        // apaga as respostas atreladas a pergunta
        Resposta::where(['pergunta_id' => $id])->delete();
        // apaga a pergunta
        Pergunta::findOrFail($id)->delete();
        return redirect()->route('questionarios.index');
    }

    public function dashboard(string $id)
    {
        $Questionario = Questionario::findOrFail($id);
        $Perguntas = Pergunta::where(['questionario_id' => $id])->get();
        return view('perguntas.dashboard',compact('Questionario','Perguntas'));
    }
}

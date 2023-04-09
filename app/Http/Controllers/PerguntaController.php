<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
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
            $idFormulario = request("adicionarPergunta");
            $request->session()->put('idFormulario', $idFormulario);
        }
        return view('perguntas.create',compact('tiposPergunta'));
    }

    public function store(Request $request, Pergunta $Pergunta)
    {
        $Pergunta->fill($request->all());
        $Pergunta->formulario_id = $request->session()->get('idFormulario');
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
        return redirect()->route('formularios.index');
    }

    public function destroy(string $id)
    {
        // apaga as respostas atreladas a pergunta
        Resposta::where(['pergunta_id' => $id])->delete();
        // apaga a pergunta
        Pergunta::findOrFail($id)->delete();
        return redirect()->route('formularios.index');
    }

    public function dashboard(string $id)
    {
        $Formulario = Formulario::findOrFail($id);
        $Perguntas = Pergunta::where(['formulario_id' => $id])->get();
        return view('perguntas.dashboard',compact('Formulario','Perguntas'));
    }
}

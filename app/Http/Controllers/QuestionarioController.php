<?php

namespace App\Http\Controllers;

use App\Models\Questionario;
use App\Models\Pergunta;
use Illuminate\Http\Request;

class QuestionarioController extends Controller
{
    public function index(Request $request)
    {
        $questionarios = Questionario::where(['ativo' => 'Sim'])->get();
        if ($request->session()->has('Questionario_id')) {
            $request->session()->pull('Questionario_id', null);
        }
        return view('questionarios.index',compact('questionarios'));
    }

    public function create()
    {
        return view('questionarios.create');
    }

    public function store(Request $request, Questionario $Questionario)
    {
        $Questionario->fill($request->all());
        $Questionario->save();
        //Pegando o ultimo id registrado
        $idQuestionario = $Questionario->id;
        //Armazenando o id numa sessão para guardar a chave estrangeira
        $request->session()->put('idQuestionario', $idQuestionario);
        return redirect()->route('perguntas.create');
    }

    public function show(string $id)
    {
        $Questionario = Questionario::findOrFail($id);
        $perguntas = Pergunta::where(['Questionario_id' => $Questionario->id])->get();

        return view('questionarios.show',compact('Questionario','perguntas'));
    }

    public function edit(string $id)
    {
        return view('questionarios.edit',['Questionario' => Questionario::findOrFail($id)]);
    }

    public function update(Request $request, string $id)
    {
        Questionario::findOrFail($id)->update($request->all());
        return redirect()->route('questionarios.index');
    }

    public function destroy(string $id)
    {
        // apaga as perguntas atreladas ao questionario
        Pergunta::where(['questionario_id' => $id])->delete();
        // apaga o questionario
        Questionario::findOrFail($id)->delete();
        return redirect()->route('questionarios.index');
    }

    public function dashboard() 
    {
        return view('questionarios.dashboard',['Questionarios' => Questionario::all()]);
    }
}

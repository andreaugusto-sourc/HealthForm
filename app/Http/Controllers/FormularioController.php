<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Pergunta;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    public function index(Request $request)
    {
        $formularios = Formulario::where(['ativo' => 'Sim'])->get();
        if ($request->session()->has('Formulario_id')) {
            $request->session()->pull('Formulario_id', null);
        }
        return view('formularios.index',compact('formularios'));
    }

    public function create()
    {
        return view('formularios.create');
    }

    public function store(Request $request, Formulario $Formulario)
    {
        $Formulario->fill($request->all());
        $Formulario->save();
        //Pegando o ultimo id registrado
        $idFormulario = $Formulario->id;
        //Armazenando o id numa sessão para guardar a chave estrangeira
        $request->session()->put('idFormulario', $idFormulario);
        return redirect()->route('perguntas.create');
    }

    public function show(string $id)
    {
        $Formulario = Formulario::findOrFail($id);
        $perguntas = Pergunta::where(['formulario_id' => $Formulario->id])->get();

        return view('formularios.show',compact('Formulario','perguntas'));
    }

    public function edit(string $id)
    {
        return view('formularios.edit',['Formulario' => Formulario::findOrFail($id)]);
    }

    public function update(Request $request, string $id)
    {
        Formulario::findOrFail($id)->update($request->all());
        return redirect()->route('formularios.index');
    }

    public function destroy(string $id)
    {
        // apaga as perguntas atreladas ao formulário
        Pergunta::where(['formulario_id' => $id])->delete();
        // apaga o formulário
        Formulario::findOrFail($id)->delete();
        return redirect()->route('formularios.index');
    }

    public function dashboard() 
    {
        return view('formularios.dashboard',['Formularios' => Formulario::all()]);
    }
}

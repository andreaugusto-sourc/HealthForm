<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Pergunta;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $formularios = Formulario::all();
        if(request('finalizar')) {
            $request->session()->pull('idFormulario', null);
        }
        return view('formularios.index',compact('formularios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formularios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Formulario = Formulario::findOrFail($id);
        $perguntas = Pergunta::where(['formulario_id' => $Formulario->id])->get();

        return view('formularios.show',compact('Formulario','perguntas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

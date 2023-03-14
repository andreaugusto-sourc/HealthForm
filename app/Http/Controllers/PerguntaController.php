<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use App\Enums\TiposPergunta;
use Illuminate\Http\Request;

class PerguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pergunta $Pergunta)
    {   
        $tiposPergunta = TiposPergunta::cases();
        return view('perguntas.create',compact('tiposPergunta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pergunta $Pergunta)
    {
        $Pergunta->fill($request->all());
        $Pergunta->formulario_id = $request->session()->get('idFormulario');
        $Pergunta->save();
        return redirect()->route('perguntas.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

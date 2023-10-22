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
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Resposta $Resposta)
    {   
        for($i = 0; $i < count($request->texto); $i++) {
            $Resposta->create([
            'questionario_id' => $request->questionario_id,
            'pergunta_id' => $request->pergunta_id[$i],
            'user_id' => Auth::id(),
            'texto' => $request->texto[$i]
            ]);
        }

        return redirect()->route('questionarios.index');
    }

    public function show(string $id)
    {
        $Questionario = Questionario::findOrFail($id);
        $perguntas = Pergunta::where(['questionario_id' => $Questionario->id])->get();
        $respostas = Resposta::all();
        $users = User::where('admin', null)->get();
        return view('respostas.show',compact('Questionario','perguntas','respostas','users'));
    }
}

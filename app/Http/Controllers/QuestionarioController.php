<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Questionario;
use App\Models\Pergunta;
use Illuminate\Http\Request;

class QuestionarioController extends Controller
{
    public function index(Request $request)
    {   
        if ($request->session()->has('Questionario_id')) {
            $request->session()->pull('Questionario_id', null);
        }

        $categorias = Categoria::pegarCategorias();

        if(isset($request->categoria_id) && $request->categoria_id != "Todas") {
            $categoria_id = $request->categoria_id;
            $questionarios = Questionario::pegarQuestionariosSemRespostasCategoria($categoria_id);

            return view('questionarios.index',compact('questionarios','categorias', 'categoria_id'));
        }

        //Pegando os questionarios que não tem respostas e que estão com status ativo
        $questionarios = Questionario::pegarQuestionariosSemRespostas();

        return view('questionarios.index',compact('questionarios','categorias'));
    }

    public function create()
    {
        return view('questionarios.create', ['categorias' => Categoria::pegarCategorias()]);
    }

    public function store(Request $request, Questionario $Questionario)
    {
        $Questionario->fill($request->all());
        $Questionario::salvandoQuestionario($Questionario);
        //Pegando o ultimo id registrado
        $idQuestionario = $Questionario->id;
        //Armazenando o id numa sessão para guardar a chave estrangeira
        $request->session()->put('idQuestionario', $idQuestionario);
        
        return redirect()->route('perguntas.create');
    }

    public function show(string $id)
    {
        $questionario = Questionario::pegarQuestionarioPerguntas($id);

        return view('questionarios.show', compact('questionario'));
    }

    public function edit(string $id)
    {
        return view('questionarios.edit',['Questionario' => Questionario::pegarQuestionario($id)]);
    }

    public function update(Request $request, string $id)
    {
        Questionario::atualizandoQuestionario($id, $request->all());

        return redirect()->route('questionarios.index');
    }

    public function destroy(string $id)
    {
        Questionario::removendoQuestionario($id);

        return redirect()->route('questionarios.index');
    }

    public function dashboard() 
    {
        return view('questionarios.dashboard',['Questionarios' => Questionario::pegarQuestionarios()]);
    }
}

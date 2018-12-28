<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidade;

class EspecialidadeController extends Controller
{
    public function index()
    {
      $especialidades = Especialidade::orderBy('nome')->paginate(10);
      return view('especialidades.index',compact("especialidades"));
    }

    public function create()
    {
      return view('especialidades.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'nome'=>'required|unique:especialidades'
      ]);
      $especialidade = new Especialidade;
      $especialidade->nome = $request->nome;
      $especialidade->save();

      return redirect()->route('especialidade_index')->with('success', 'Especialidade adicionada!');
    }

    public function edit($id)
    {
      $especialidade = Especialidade::findOrFail($id);
      return view('especialidades.edit',compact('especialidade'));
    }

    public function update(Request $request, $id)
    {
      $especialidade = Especialidade::findOrFail($id);
      $especialidade->nome = $request->nome;
      $especialidade->save();
      return redirect()->route('especialidade_index')->with('success', 'Especialidade alterada!');;
    }

    public function delete($id)
    {
      $especialidade = Especialidade::findOrFail($id);
      $especialidade->delete();
      return redirect()->route('especialidade_index')->with('success', 'Especialidade Excluída!');;;
    }
}

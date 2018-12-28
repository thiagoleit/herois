<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;

class TipoController extends Controller
{
    public function index()
    {
      $tipos = Tipo::orderBy('nome')->paginate(10);
      return view('tipos.index',compact("tipos"));
    }

    public function create()
    {
      return view('tipos.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'nome'=>'required|unique:tipos'
      ]);
      $tipo = new Tipo;
      $tipo->nome = $request->nome;
      $tipo->save();

      return redirect()->route('tipo_index')->with('success', 'Tipo adicionado!');
    }

    public function edit($id)
    {
      $tipo = Tipo::findOrFail($id);
      return view('tipos.edit',compact('tipo'));
    }

    public function update(Request $request, $id)
    {
      $tipo = Tipo::findOrFail($id);
      $tipo->nome = $request->nome;
      $tipo->save();
      return redirect()->route('tipo_index')->with('success', 'Tipo alterado!');;
    }

    public function delete($id)
    {
      $tipo = Tipo::findOrFail($id);
      $tipo->delete();
      return redirect()->route('tipo_index')->with('success', 'Tipo Excluído!');;;
    }
}

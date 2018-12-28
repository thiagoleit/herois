<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guerreiro;
use App\Repositories\ImageRepository;
use App\Especialidade;
use App\EspecialidadeGuerreiro;
use App\ImagemGuerreiro;

class GuerreiroController extends Controller
{
      public function index()
      {
        $guerreiros = Guerreiro::all();
        return view('guerreiros.index',compact("guerreiros", "especialidades"));
      }

      public function create()
      {
        $especialidades = Especialidade::all();
        return view('guerreiros.create', compact("especialidades"));
      }

      public function store(Request $request, ImageRepository $repo)
      {

        $request->validate([
        'nome'=>'required|unique:guerreiros',
        'vida'=> 'required|integer',
        'defesa' => 'required|integer',
        'defesa' => 'required|integer',
        'ataque' => 'required|between:0,9.9',
        'movimento' => 'required|integer',
        'especialidade' => 'required'
        ]);
        $guerreiro = new Guerreiro;
        $guerreiro->nome = $request->nome;
        $guerreiro->vida = $request->vida;
        $guerreiro->defesa = $request->defesa;
        $guerreiro->dano = $request->dano;
        $guerreiro->ataque = $request->ataque;
        $guerreiro->movimento = $request->movimento;

        $guerreiro->save();

        if ($request->hasFile('imagem')) {
           foreach($request->imagem as $imagem){
             $path = $repo->saveImage($imagem, $guerreiro->id, 'imagem_guerreiro', 250);
             $img = new ImagemGuerreiro;
             $img->guerreiro_id = $guerreiro->id;
             $img->imagem = $path;
             $img->save();
           }
        }
        if (($request->especialidade)){
          $guerreiro->especialidades()->sync($request->especialidade);
        }

        return redirect('/guerreiros')->with('success', 'Guerreiro adicionado!');
      }

      public function edit($id)
      {
        $guerreiro = Guerreiro::findOrFail($id);
        $especialidades = Especialidade::all();
        $guerreiro_especialidades = $guerreiro->especialidades()->get();
        $imagens = ImagemGuerreiro::where('guerreiro_id', $id)->get();
        return view('guerreiros.edit',compact('guerreiro','especialidades','guerreiro_especialidades', 'imagens' ));
      }

      public function update(Request $request, ImageRepository $repo, $id)
      {
        $guerreiro = Guerreiro::findOrFail($id);
        $guerreiro->nome = $request->nome;
        $guerreiro->vida = $request->vida;
        $guerreiro->defesa = $request->defesa;
        $guerreiro->dano = $request->dano;
        $guerreiro->ataque = $request->ataque;
        $guerreiro->movimento = $request->movimento;

        $guerreiro->save();

        $imgs = $guerreiro->imagens($id);
        foreach($imgs as $img){
          $img->delete();
        }

        foreach($request->upload_imagem as $imagem){
          if (strpos($imagem, 'blob:') === false){
            $img = new ImagemGuerreiro;
            $img->guerreiro_id = $id;
            $img->imagem = $imagem;
            $img->save();
          }
        }

       foreach($request->imagem as $imagem){
         $path = $repo->saveImage($imagem, $id, 'imagem_guerreiro', 120);
         $img = new ImagemGuerreiro;
         $img->guerreiro_id = $id;
         $img->imagem = $path;
         $img->save();
       }


        return redirect()->route('guerreiro_index');
      }

      public function delete($id)
      {
        $guerreiro = Guerreiro::findOrFail($id);
        $guerreiro->especialidades()->detach();

        $imgs = $guerreiro->imagens($id);
        foreach($imgs as $img){
          $img->delete();
        }
        $guerreiro->delete();
        return redirect()->route('guerreiro_index')->with('success', 'Guerreiro excluído!');
      }
}

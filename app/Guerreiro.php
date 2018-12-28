<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guerreiro extends Model
{

    protected $fillable = ['nome', 'vida', 'defesa', 'dano', 'ataque', 'movimento'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'guerreiros';

    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class);
    }

    public function imagens($id)
    {
        return ImagemGuerreiro::where('guerreiro_id', $id)->get();
    }




  }

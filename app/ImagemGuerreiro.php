<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagemGuerreiro extends Model
{
    protected $table = 'imagem_guerreiro';
    protected $fillable = ['guerreiro_id','imagem'];
    protected $primaryKey = 'guerreiro_id';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $fillable = ['nome'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'tipos';

    public function guerreiro()
    {
      return $this->belongsTo(Guerreiro::class);
    }
}

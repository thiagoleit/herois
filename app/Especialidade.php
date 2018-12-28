<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{

    protected $fillable = ['nome'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'especialidades';

    public function guerreiros()
    {
        return $this->belongsToMany(Guerreiro::class);
    }
}

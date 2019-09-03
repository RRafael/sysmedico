<?php

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{

    protected $table = "especialidade";

    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'especialidade_medico');
    }
}

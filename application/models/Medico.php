<?php
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{

    protected $table = "medico";

    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class, 'especialidade_medico');
    }
}

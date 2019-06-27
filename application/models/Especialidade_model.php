<?php

class Especialidade_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $query = $this->db->get('especialidade');
        return $query->result();
    }
}

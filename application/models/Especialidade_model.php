<?php

class Especialidade_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function buscar($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('especialidade');
        return $query->row();
    }

    public function listar()
    {
        $query = $this->db->get('especialidade');
        return $query->result();
    }
}

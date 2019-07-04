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

    public function buscarPorIdMedico($idMedico)
    {
        $this->db->select('especialidade.id, especialidade.nome');
        $this->db->from('especialidade');
        $this->db->join('especialidade_medico', 'especialidade_medico.especialidade_id = especialidade.id');
        $this->db->where('especialidade_medico.medico_id', $idMedico);
        $query = $this->db->get();
        return $query->result();
    }
}

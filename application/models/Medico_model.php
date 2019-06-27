<?php

class Medico_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function salvar($dados)
    {
        $this->db->trans_strict(FALSE);
        
        $this->db->trans_begin();
        
        $this->db->insert('medico', $dados);
        exit();
        $medico_id = $this->db->insert_id();
        $especialidade_id = $dados['especialidades'];
        pd($especialidade_id);
        $this->db->insert('especialidade_medico', $dados);
    
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }

    public function buscar($id)
    {
        $query = $this->db->select('*')
            ->from('medico')
            ->where('id', $id)
            ->get();
        return $query->row();
    }

    public function deletar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('medico');
        return $this->db->affected_rows();
    }

    public function listar()
    {
        $query = $this->db->get('medico');
        return $query->result();
    }

    public function atualizar($dados)
    {
        $this->db->where('id', $dados['id']);
        $this->db->update('medico', $dados);
        return $this->db->affected_rows();
    }
}

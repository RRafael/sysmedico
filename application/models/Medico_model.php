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
        
        $this->db->insert('medico', $dados['medico']);
        $medico_id = $this->db->insert_id();
        
        $count = count($dados['especialidades']);
        for ($i = 0; $i < $count; $i ++) {
            $this->db->insert('especialidade_medico', array(
                'medico_id' => $medico_id,
                'especialidade_id' => $dados['especialidades'][$i]
            ));            
        }
        
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

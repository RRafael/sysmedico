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
        $idMedico = $this->db->insert_id();
        
        $this->salvarEspecialidades($idMedico, $dados['especialidades']);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }

    public function buscar($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('medico');
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

    public function buscarEspecialidades($idMedico)
    {
        $this->db->select('especialidade.id, especialidade.nome');
        $this->db->from('especialidade');
        $this->db->join('especialidade_medico', 'especialidade_medico.especialidade_id = especialidade.id');
        $this->db->where('especialidade_medico.medico_id', $idMedico);
        $query = $this->db->get();
        return $query->result();
    }

    public function salvarEspecialidades($idMedico, $especialidades)
    {
        $count = count($especialidades);
        for ($i = 0; $i < $count; $i ++) {
            $this->db->insert('especialidade_medico', array(
                'medico_id' => $idMedico,
                'especialidade_id' => $especialidades[$i]
            ));
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medico extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(false);
        $this->load->model('medico_model');
        $this->load->model('especialidade_model');
    }

    public function index()
    {
        $dados['menu_ativo'] = 'medicos';
        $this->load->view('listar_medicos_view', $dados);
    }

    public function listar()
    {
        $dados['data'] = $this->medico_model->listar();
        echo json_encode($dados);
    }

    public function cadastrar()
    {
        $dados['menu_ativo'] = null;
        
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('crm', 'crm', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('telefone', 'telefone', 'trim|required');
        $this->form_validation->set_rules('cidade', 'cidade', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('estado', 'estado', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('especialidades[]', 'Especialidade', 'trim|required|integer');
        
        if ($this->form_validation->run() == FALSE) {
            $dados['erros'] = validation_errors('<li>', '</li>');
            $dados['lista_especialidades'] = $this->especialidade_model->listar();
            $dados['especialidades'] = $this->input->post('especialidades');
            $this->load->view('cadastrar_medico_view', $dados);
        } else {
            $dados['medico'] = array(
                'nome' => $this->input->post('nome'),
                'crm' => $this->input->post('crm'),
                'telefone' => $this->input->post('telefone'),
                'cep' => $this->input->post('cep'),
                'cidade' => $this->input->post('cidade'),
                'estado' => $this->input->post('estado')
            );
            
            $dados['especialidades'] = $this->input->post('especialidades');
            
            $controle = $this->medico_model->salvar($dados);
            // if ($controle) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            Seus dados foram <strong>armazenados</strong> com sucesso no banco de dados.
                                          </div>');
            redirect('medico', 'refresh');
            // } else {}
        }
    }

    public function editar()
    {
        $dados['menu_ativo'] = null;
        $dados['medico'] = $this->medico_model->buscar($this->input->get('id'));
        $dados['especialidade_medico'] = $this->medico_model->buscarEspecialidades($this->input->get('id'));
        $dados['lista_especialidades'] = $this->especialidade_model->listar();
        $this->load->view('editar_medico_view', $dados);
    }

    public function atualizar()
    {
        $dados['menu_ativo'] = null;
        
        $this->form_validation->set_rules('id', 'id', 'trim|required|integer');
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('crm', 'crm', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('telefone', 'telefone', 'trim|required');
        $this->form_validation->set_rules('cidade', 'cidade', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('estado', 'estado', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('especialidades[]', 'Especialidade', 'trim|required|integer');
        
        if ($this->form_validation->run() == FALSE) {
            $dados['lista_especialidades'] = $this->especialidade_model->listar();
            $dados['erros'] = validation_errors('<li>', '</li>');
            $dados['especialidades'] = $this->input->post('especialidades');
            $this->load->view('editar_medico_view', $dados);
        } else {
            $dados = array(
                'id' => $this->input->post('id'),
                'nome' => $this->input->post('nome'),
                'crm' => $this->input->post('crm'),
                'telefone' => $this->input->post('telefone'),
                'cep' => $this->input->post('cep'),
                'cidade' => $this->input->post('cidade'),
                'estado' => $this->input->post('estado')
            );
            
            $controle = $this->medico_model->atualizar($dados);
            // echo $controle;
            // if ($controle > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                             Seus dados foram <strong>atualizados</strong> com sucesso no banco de dados.
                                          </div>');
            redirect('medico', 'refresh');
            // } else {}
        }
    }

    public function deletar()
    {
        $dados['menu_ativo'] = 'medicos';
        $controle = $this->medico_model->deletar($this->input->get('id'));
        if ($controle) {
            // deletado com sucesso
            $this->session->set_flashdata('msg', '<div class="alert alert-success fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                             Seus dados foram <strong>removido</strong> com sucesso no banco de dados.
                                          </div>');
            redirect('medico', 'refresh');
        } else {
            // ouve um erro
        }
    }
}
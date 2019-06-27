<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Especialidade extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('especialidade_model');
    }

    public function index()
    {
        $dados['menu_ativo'] = 'medicos';
    }

    public function listar()
    {
        $dados = $this->especialidade_model->listar();
        echo json_encode($dados);
    }

}
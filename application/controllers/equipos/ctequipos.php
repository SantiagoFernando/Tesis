<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ctequipos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("mcategorias");
        $this->load->model("mequipos");
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = array(
            'equipo' => $this->mequipos->getNum(),
            'categorias' => $this->mcategorias->getActivas(),
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('equipo/vequipos', $data);
        $this->load->view('layouts/footer');
    }

    public function imprimir()
    {
        $data = array(
            'equipos' => $this->mequipos->getEquipos(),
        );
        $this->load->view('equipo/print', $data);
    }

    public function listar()
    {
        $result = $this->mequipos->getEqui();
        echo json_encode($result);
    }

    public function addE()
    {
        $result = $this->mequipos->add();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function editarEq()
    {
        $result = $this->mequipos->geteqiSelec();
        echo json_encode($result);
    }

    public function updateMaqi()
    {
        $result = $this->mequipos->updateEquipos();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    //Metodo para desactivar Categoria 
    public function deleteEq()
    {
        $result = $this->mequipos->desactivado(); //-->Llamamos el modelo
        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Equipo Desactivado Correctamente...';
        }
        echo json_encode($response);
    }

    public function activarE()
    {
        $result = $this->mequipos->activado(); //-->Llamamos el modelo
        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Equipo Activado Correctamente...';
        }
        echo json_encode($response);
    }
}

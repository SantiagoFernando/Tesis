<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ctcategoria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("mcategorias");
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = array(
            'numeroCat' => $this->mcategorias->getNum(),
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('categoria/vcategoria', $data);
        $this->load->view('layouts/footer');
    }

    public function listar()
    {
        $result = $this->mcategorias->getCat();
        echo json_encode($result);
    }
    public function addC()
    {
        $result = $this->mcategorias->add();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function editCat()
    {
        $result = $this->mcategorias->getCategoria();
        echo json_encode($result);
    }

    public function updateCat()
    {
        $result = $this->mcategorias->updateCt();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    //Metodo para desactivar Categoria 
    public function deleteCat()
    {
        $result = $this->mcategorias->desactivar(); //-->Llamamos el modelo
        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Categoria Desactivada Correctamente...';
        }
        echo json_encode($response);
    }

    public function activarCat()
    {
        $result = $this->mcategorias->activada(); //-->Llamamos el modelo
        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Categoria Activada Correctamente...';
        }
        echo json_encode($response);
    }
}

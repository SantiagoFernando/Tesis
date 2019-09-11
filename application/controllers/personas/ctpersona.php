<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ctpersona extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("mpersona");
        $this->load->model("mcuenta");
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('persona/personaNormal/vperson');
        $this->load->view('layouts/footer');
    }

    public function listar()
    {
        $result = $this->mpersona->getPerso();
        echo json_encode($result);
    }

    /*public function addPersons()
    {
        $result = $this->mpersona->add();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function updateP()
    {
        $result = $this->mpersona->updatePersonas();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }*/

    public function addPersons()
    {
        $cedula = $this->input->post('txtcedula');
        $apellido = $this->input->post('txtapellidos');
        $nombre = $this->input->post('txtnombres');
        $direccion = $this->input->post('txtdir');
        $telefono = $this->input->post('txttelf');
        $email = $this->input->post('correo');
        $cargo = $this->input->post('txtcargo');

        $this->form_validation->set_rules("txtcedula", "Cedula", "required|is_unique[persona.cedula]");

        if ($this->form_validation->run() == false) {
            $response = array(
                'status' => false,
                'message' => validation_errors()
            );
        } else {
            $data = array(
                'cedula' => $cedula,
                'apellido' => $apellido,
                'nombre' => $nombre,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'email' => $email,
                'rol' => 'PERSONA',
                'cargo' => $cargo,
                'estadopersona' => 'A',
            );
            $this->mpersona->add($data);
            $response = array(
                'status' => true,
                'success' => 'success',
                'type' => 'add',
            );
        }
        echo json_encode($response);
    }

    public function editarPer()
    {
        $result = $this->mpersona->getePerSelec();
        echo json_encode($result);
    }

    public function updateP()
    {
        $result = $this->mpersona->updatePersonas();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    //Metodo para desactivar Categoria 
    public function delete()
    {
        $result = $this->mpersona->desactivado(); //-->Llamamos el modelo
        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Persona Desactivada Correctamente...';
        }
        echo json_encode($response);
    }

    public function activarP()
    {
        $result = $this->mpersona->activado(); //-->Llamamos el modelo
        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Persona Activada Correctamente...';
        }
        echo json_encode($response);
    }
}

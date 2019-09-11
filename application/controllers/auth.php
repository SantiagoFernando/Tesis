<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("mcuenta");
    $this->load->model("mpersona");
  }/*Hacemos el constructor*/

  public function index()
  {
    $datap = array(
      'persona' => $this->mpersona->getNum(),
    );

    if ($this->session->userdata("login")) {
      redirect(base_url() . "dashboard");
    } else {
      $this->load->view('admin/login', $datap);
    }
  }

  public function login()
  {
    $username = $this->input->post("username");
    $password = $this->input->post("password");
    $res = $this->mcuenta->login($username, sha1($password)); //sha1 sirve para encriptar claves
    if (!$res) {
      $this->session->set_flashdata("Error", "El usuario y/o contraseña son incorrectos");
      redirect(base_url());
    } else {
      $data = array(
        'idcuenta' => $res->idcuenta,
        'apellido' => $res->apellido,
        'loginc' => $res->usario,
        'nombre' => $res->nombre,
        'rol' => $res->rol,
        'login' => TRUE,
      );
      $this->session->set_userdata($data);
      redirect(base_url() . "dashboard");
    }
  }

  public function singin()
  {
    $this->load->view('admin/sigin');
  }

  public function recuperar()
  {
    $this->load->view('admin/recuperar');
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }

  public function registrar()
  {
    $cedula = $this->input->post("txtcedula");
    $apellido = $this->input->post("txtapellidos");
    $nombre = $this->input->post("txtnombres");
    $direccion = $this->input->post("txtdir");
    $telefono = $this->input->post("txttelf");
    $correo = $this->input->post("email");

    $data = array(
      'cedula'=>$cedula,
      'apellido'=>$apellido,
      'nombre'=>$nombre,
      'direccion'=>$direccion,
      'telefono'=>$telefono,
      'email'=>$correo,
      'rol'=>'ADMIN',
      'cargo'=>'DOCENTE',
      'estadopersona'=>'A',
    );
    
    if($this->mpersona->save($data)){
      $idpersona= $this->mpersona->recuperarId();
      $datC = array(
        'usuario' => $cedula,
        'clave' => sha1($cedula),
        'estadocuenta' => 'A',
        'personaid' => $idpersona,
      );

      if($this->mcuenta->save($datC)){
        $dataper = array(
        'persona' => $this->mpersona->getNum(),
        );
        $this->load->view('admin/login', $dataper);
      }
    }else{
      redirect(base_url() ."admin/sigin");
    }

  }

}

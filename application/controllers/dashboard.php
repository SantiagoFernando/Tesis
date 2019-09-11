<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("mpersona");
    $this->load->model("mcategorias");
    $this->load->model("mequipos");
    $this->load->model("mprestamos");
    if (!$this->session->userdata("login")) {
      redirect(base_url());
    }
  }

  public function index()
  {
    $data = array(
      'equipo' => $this->mequipos->getNum(),
      'numeroCat' => $this->mcategorias->getNum(),
      'persona' => $this->mpersona->getNum(),
      'prestamo' => $this->mprestamos->getNumPres(),
  );

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('layouts/footer');
  }
}

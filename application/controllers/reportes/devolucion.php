<?php
defined('BASEPATH') or exit('No direct script access allowed');

class devolucion extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("mpersona");
    $this->load->model("mequipos");
    $this->load->model("mprestamos");
    if (!$this->session->userdata("login")) {
      redirect(base_url());
    }
  }

  public function index()
  {
    $data = array(
      'prestamos' => $this->mprestamos->getPrestamos(),
    );

    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('reportes/devoluciones', $data);
    $this->load->view('layouts/footer');
  }
}
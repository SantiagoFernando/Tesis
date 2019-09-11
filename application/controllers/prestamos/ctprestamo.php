<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ctprestamo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("mpersona");
        $this->load->model("mcategorias");
        $this->load->model("mequipos");
        $this->load->model("mprestamos");
        $this->load->model("mdetallepre");
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = array(
            'categorias' => $this->mcategorias->getActivas(),
            'prestamos' => $this->mprestamos->getPrestamos(),
            'personas' => $this->mpersona->getPerso(),
            'detalles' => $this->mdetallepre->getDetalles(),
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('prestamo/vprestamo', $data);
        $this->load->view('layouts/footer');
    }

    public function listar()
    {
        $data = $this->mprestamos->getPrestamos();
        $data+= $this->mdetallepre->getDetalles();
        echo json_encode($data);
    }

    public function updateP()
    {
        $result = $this->mequipos->updatePre();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function editarPre()
    {
        $datos = $this->mprestamos->getSel();
        echo json_encode($datos);
    }

    public function backup()
    {
        $this->load->view('prestamo/respaldos');
    }

    public function getTodos()
    {
        $idcategoria = $this->input->post("idcategoria");
        $equipos = $this->mequipos->getNom($idcategoria);
        $equi_select_box = '';
        $equi_select_box .= '<option value="">---SELECCIONE---</option>';

        if (count($equipos) > 0) {
            foreach ($equipos as $equipo) {
                if ($equipo->estadoprestamo == "D") {
                    $equi_select_box .= '<option value="' . $equipo->idequipo . '">' . $equipo->idequipo . '</option>';
                }
            }
        } else {
            $equi_select_box = '<option value=" ">---SELECCIONE---</option>';
        }
        echo json_encode($equi_select_box);
    }

    public function getAlquilantes()
    {
        $valor = $this->input->post("valor");
        $personas = $this->mprestamos->getPersonas($valor);
        echo json_encode($personas);
    }

    public function guardar()
    {
        $id = $this->input->post('idper');
        $cedula = $this->input->post('txtcedulap');
        $apellido = $this->input->post('txtapeper');
        $nombre = $this->input->post('txtnomper');
        $encar = $this->input->post('txtencargado');
        $fechaprestamo = $this->input->post('fecha');

        $dataPre = array(
            'persona' => $cedula,
            'apellidoper' => $apellido,
            'nombreper' => $nombre,
            'encargado' => $encar,
            'fechaprestamo' => $fechaprestamo,
            'estadoprestamo' => 'PENDIENTE',
            'idper' => $id
        );

        $cant = $this->input->post('txtDt');

        if ($this->mprestamos->save($dataPre)) {
            $idprestamo = $this->mprestamos->recuperarid();

            for ($i = 0; $i <= $cant; $i++) {

                $cat = $this->input->post('txtCt[]');
                $eq = $this->input->post('txtEq[]');

                $detalle = array(
                    'iddetalle' => $idprestamo,
                    'categoria' => $cat[$i],
                    'numeroequipo' => $eq[$i],
                    'equipoid' => $eq[$i],
                );

                //GUardar informacion en la tablade Detalle
                $this->mprestamos->saved($detalle);
                //Cambiar el estado del equipo de disponible a ocupado
                $this->mequipos->ocupar($eq[$i]);
            }

            redirect(base_url() . 'prestamos/ctprestamo');
        } else {
            redirect(base_url() . 'dashboard');
        }
    }

}

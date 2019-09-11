<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ctadmin extends CI_Controller
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
        $data = array(
            'persona' => $this->mpersona->getPerso(),
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('persona/administrativo/vadmin', $data);
        $this->load->view('layouts/footer');
    }

    public function add()
    {
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('persona/administrativo/vnew');
        $this->load->view('layouts/footer');
    }

    //funcion para traeer la entidad ha ser editada
    public function edd($id)
    {
        $dataE = array(
            'persona' => $this->mpersona->getGente($id),
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('persona/administrativo/vadEdit', $dataE);
        $this->load->view('layouts/footer');
    }

    //Metodo para ingresar los datos a la base de datos
    public function fsave()
    {
        //Datos par la tabla Persona
        $cedula = $this->input->post("txtcedula");
        $apellidos = $this->input->post("txtapellido");
        $nombres = $this->input->post("txtnombre");
        $telefono = $this->input->post("txttelefono");
        $email = $this->input->post("txtemail");
        $direccion = $this->input->post("txtdireccion");

        //Datos para la tabla Cuenta
        $clave = $this->input->post("txtClave2");

        //INICIO DE REGLAS
        $this->form_validation->set_rules("txtcedula", "Cedula", "required|is_unique[persona.cedula]");
        $this->form_validation->set_rules("txtemail", "Email", "required|is_unique[persona.email]");
        $this->form_validation->set_rules("txtapellido", "Apellidos", "required[persona.apellido]");
        $this->form_validation->set_rules("txtnombre", "Nombres", "required[persona.nombre]");
        $this->form_validation->set_rules("txttelefono", "Telefono", "required[persona.nombre]");
        $this->form_validation->set_rules("txtdireccion", "Direccion", "required");
        $this->form_validation->set_rules("txtclave", "Clave1", "required");
        $this->form_validation->set_rules("txtclave2", "Clave2", "required");

        if ($this->form_validation->run()) {
            //FIN DE REGLAS

            $dataPersona = array(
                'apellido' => $apellidos,
                'nombre' => $nombres,
                'cedula' => $cedula,
                'telefono' => $telefono,
                'email' => $email,
                'estadopersona' => 'A',
                'rol' => 'ADMIN',
                'cargo' => 'DOCENTE',
                'direccion' => $direccion,
            );

            try {
                $this->db->trans_begin();
                $this->mpersona->save($dataPersona);
                $idPersona = $this->mpersona->recuperarId();
                $dataCuenta = array(
                    'usuario' => $cedula,
                    'clave' => sha1($clave),
                    'estadocuenta' => 'A',
                    'personaid' => $idPersona,
                );
                $this->mcuenta->save($dataCuenta);
                $this->db->trans_commit();
                $this->session->set_flashdata("exito", "El Usuario $apellidos $nombres se registro Satisfactoriamente");
                redirect(base_url() . 'personas/ctadmin');
            } catch (PDOException $ex) {
                $this->db->trans_rollback(); //Para evitar datos guardados en una sola tabla, guardar en varias tablas
            }
        } else {
            $this->add();
        }
    }

    //funcion para actualizar el objeto obtenido con el metodo edd
    public function actualizar()
    {
        //Datos par la tabla Persona
        $idpersona = $this->input->post("txtidpersona");
        $cedula = $this->input->post("txtcedula");
        $apellidos = $this->input->post("txtapellido");
        $nombres = $this->input->post("txtnombre");
        $telefono = $this->input->post("txttelefono");
        $email = $this->input->post("txtemail");
        $direccion = $this->input->post("txtdireccion");

        //Datos para la tabla Cuenta
        $clave = $this->input->post("txtclave2");

        //INICIO DE REGLAS
        //$this->form_validation->set_rules("txtcedula", "Cedula", "required|is_unique[persona.cedula]");
        //$this->form_validation->set_rules("txtemail", "Email", "required|is_unique[persona.email]");
        $this->form_validation->set_rules("txtapellido", "Apellidos", "required");
        $this->form_validation->set_rules("txtnombre", "Nombres", "required");
        $this->form_validation->set_rules("txttelefono", "Telefono", "required");
        $this->form_validation->set_rules("txtdireccion", "Direccion", "required");
        $this->form_validation->set_rules("txtclave", "Clave1", "required");
        $this->form_validation->set_rules("txtclave2", "Clave2", "required");

        if ($this->form_validation->run()) {
            $dataPersona = array(
                'cedula' => $cedula,
                'apellido' => $apellidos,
                'nombre' => $nombres,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'email' => $email,
                'cargo' => 'DOCENTE',
                'rol' => 'ADMIN',
                'estadopersona' => 'A',
            );

            try {
                $this->db->trans_begin();
                $this->mpersona->update($idpersona, $dataPersona);
                $dataCuenta = array(
                    'usuario' => $cedula,
                    'clave' => sha1($clave),
                );
                $this->mcuenta->update($idpersona, $dataCuenta);
                $this->db->trans_commit();
                $this->session->set_flashdata("act", "La Persona $apellidos $nombres se actualizo correctamente");
                redirect(base_url()."personas/ctadmin");
                
            } catch (PDOException $ex) {
                $this->db->trans_rollback(); //Para evitar datos guardados en una sola tabla, guardar en varias tablas
            }
        } else {
           /* $dataEd = array(
                'persona' => $this->mpersona->getGente($idpersona),
            );*/
            redirect(base_url() . 'personas/ctadmin/edd/'.$idpersona);
            //redirect(base_url());
        }
    }

    public function desactivar($idpersona)
    {
        if ($this->session->userdata("idcuenta") == $idpersona) {
            redirect(base_url() . 'personas/ctadmin/index');
        } else {
            if ($this->session->userdata("idcuenta") != $idpersona) {
                $result = $this->mpersona->baja($idpersona); //-->Llamamos el modelo
                if ($result == true) {
                    redirect(base_url() . 'dashboard');
                } else {
                    $this->session->set_flashdata("act", "Erro al quere Desactivar");
                }
            }
        }
    }

    public function activarse($idpersona)
    {
        $result = $this->mpersona->subir($idpersona);
        if($result == true){
            redirect(base_url() . 'dashboard');
        }else {
            $this->session->set_flashdata("act", "Erro al querer Activar");
        }
    }

}

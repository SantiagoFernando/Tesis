<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mprestamos extends CI_Model
{
  public function getNumPres()
  {
    $resultado = $this->db->get('prestamo');
    return $resultado->num_rows();
  }

  public function save($data)
  {
    return $this->db->insert("prestamo", $data);
  }

  public function recuperarId()
  {
    return $this->db->insert_id();
  }

  //Guardar el detalle de los prestamos
  public function saved($data)
  {
    return $this->db->insert("detalleprestamo", $data);
  }

  public function getPrestamos()
  {
    $this->db->order_by('apellidoper', 'asc');
    $query = $this->db->get('prestamo');
    return $query->result();
  }

  //Consulta para el Auto Completado
  public function getPersonas($valor)
  {
    $this->db->select('persona.idpersona as idper, persona.nombre as txtnomper, persona.apellido as txtapeper, persona.cedula as label');
    $this->db->from('persona');
    $this->db->where('persona.estadopersona', "A");
    $this->db->like('persona.cedula', $valor);
    $resultados = $this->db->get();
    return $resultados->result_array();
  }

  //Listar el Detalle del Prestamo
  public function getSel()
  {
    $id = $this->input->post('id');
    $this->db->where('idprestamo', $id);
    $query = $this->db->get('prestamo');
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  //Cambiar el estado de los equipos Prestados
  public function desactivado($id)
  {
    $field = array(
      'estadoprestamo' => 'O',
    );
    $this->db->where('idequipo', $id);
    $this->db->update('equipo', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function activado($id)
  {
    $field = array(
      'estadoprestamo' => 'D',
    );
    $this->db->where('idequipo', $id);
    $this->db->update('equipo', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}

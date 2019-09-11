<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mpersona extends CI_Model
{
  public function getNum()
  {
    $resultado = $this->db->get('persona');
    return $resultado->num_rows();
  }

  public function save($data)
  {
    return $this->db->insert("persona", $data);
  }

  public function recuperarId()
  {
    return $this->db->insert_id();
  }

  public function getPerso()
  {
    $this->db->order_by('apellido', 'asc');
    $query = $this->db->get('persona');
    return $query->result();
  }

  public function add($data)
  {
    /*$field = array(
      'cedula' => $this->input->post('txtcedula'),
      'apellido' => $this->input->post('txtapellidos'),
      'nombre' => $this->input->post('txtnombres'),
      'direccion' => $this->input->post('txtdir'),
      'telefono' => $this->input->post('txttelf'),
      'email' => $this->input->post('correo'),
      'rol' => 'PERSONA',
      'cargo' => $this->input->post('txtcargo'),
      'estadopersona' => 'A',
    );*/
    $this->db->insert('persona', $data);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function updatePersonas()
  {
    $id = $this->input->post('idpersona');
    $field = array(
      'cedula' => $this->input->post('txtcedula'),
      'apellido' => $this->input->post('txtapellidos'),
      'nombre' => $this->input->post('txtnombres'),
      'direccion' => $this->input->post('txtdir'),
      'telefono' => $this->input->post('txttelf'),
      'email' => $this->input->post('correo'),
      'rol' => 'PERSONA',
      'cargo' => $this->input->post('txtcargo'),
      'estadopersona' => 'A',
    );
    $this->db->where('idpersona', $id);
    $this->db->update('persona', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function getePerSelec()
  {
    $id = $this->input->post('id');
    $this->db->where('idpersona', $id);
    $query = $this->db->get('persona');
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function desactivado()
  {
    $id = $this->input->post('delete');
    $field = array(
      'estadopersona' => 'I',
    );
    $this->db->where('idpersona', $id);
    $this->db->update('persona', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function activado()
  {
    $id = $this->input->post('active');
    $field = array(
      'estadopersona' => 'A',
    );
    $this->db->where('idpersona', $id);
    $this->db->update('persona', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function getGente($id)
  {
    $this->db->select('persona.*');
    $this->db->from('persona');
    $this->db->where('idpersona', $id);
    $resultado = $this->db->get();
    return $resultado->row();
  }

  public function update($idpersona, $dataPersona)
  {
    $this->db->where('idpersona', $idpersona);
    return $this->db->update('persona', $dataPersona);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function baja($id)
  {
    $field = array(
      'estadopersona' => 'I',
    );
    $this->db->where('idpersona', $id);
    $this->db->update('persona', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function subir($id)
  {
    $field = array(
      'estadopersona' => 'A',
    );
    $this->db->where('idpersona', $id);
    $this->db->update('persona', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}

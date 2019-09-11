<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mcuenta extends CI_Model
{

  public function login($username, $password)
  {
    $this->db->select('cuenta.*,persona.*');
    $this->db->from('cuenta');
    $this->db->join('persona', 'persona.idpersona = cuenta.idcuenta');
    $this->db->where("cuenta.estadocuenta = 'A'");
    $this->db->where("cuenta.usuario", $username);
    $this->db->where("cuenta.clave", $password);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function getCuenta($id)
  {
    $this->db->select('cuenta.*');
    $this->db->from('cuenta');
    $this->db->where('idcuenta', $id);
    $resultado = $this->db->get();
    return $resultado->row();
  }

  public function save($dataC)
  {
    return $this->db->insert("cuenta", $dataC); //Metodo para insertar datos en la base de datos
  }

  public function update($idpersona, $dataCuenta)
  {
    $this->db->where('idcuenta', $idpersona);
    return $this->db->update('cuenta', $dataCuenta);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}

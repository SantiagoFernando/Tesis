<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mcategorias extends CI_Model
{
  public function getNum()
  {
    $resultado = $this->db->get('categoria');
    return $resultado->num_rows();
  }

  public function getCat()
  {
    $this->db->order_by('nombrecategoria', 'asc');
    $query = $this->db->get('categoria');
    return $query->result();
  }

  public function getActivas()
  {
    $this->db->where("estadocategoria = 'A'");
    $this->db->order_by('nombrecategoria', 'asc');
    $query = $this->db->get('categoria');
    return $query->result();
  }

  public function add()
  {
    $field = array(
      'nombrecategoria' => $this->input->post('nombrecategoria'),
      'estadocategoria' => 'A',
    );
    $this->db->insert('categoria', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function getCategoria()
  {
    $id = $this->input->post('id');
    $this->db->where('idcategoria', $id);
    $query = $this->db->get('categoria');
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
  public function updateCt()
  {
    $id = $this->input->post('idcategoria');
    $field = array(
      'nombrecategoria' => $this->input->post('nombrecategoria'),
    );
    $this->db->where('idcategoria', $id);
    $this->db->update('categoria', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  ////-------------------------->
  public function desactivar()
  {
    $id = $this->input->post('delete');
    $field = array(
      'estadocategoria' => 'I',
    );
    $this->db->where('idcategoria', $id);
    $this->db->update('categoria', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function activada()
  {
    $id = $this->input->post('active');
    $field = array(
      'estadocategoria' => 'A',
    );
    $this->db->where('idcategoria', $id);
    $this->db->update('categoria', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}

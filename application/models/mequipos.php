<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mequipos extends CI_Model
{
  public function getNum()
  {
    $resultado = $this->db->get('equipo');
    return $resultado->num_rows();
  }

  public function getEqui()
  {
    $this->db->order_by('numero', 'asc');
    $query = $this->db->get('equipo');
    return $query->result();
  }

  //Categorias visualizadas en el Equipo
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
      'adquisicion' => $this->input->post('txtadqui'),
      'serie' => $this->input->post('txtserie'),
      'modelo' => $this->input->post('txtmodelo'),
      'marca' => $this->input->post('txtmarca'),
      'numero' => $this->input->post('txtnumero'),
      'ubicacion' => $this->input->post('txtaula'),
      'fechacompra' => $this->input->post("fecha"),
      'estadoprestamo' => 'D',
      'estadoequipo' => 'A',
      'categoriaid' => $this->input->post('categoria'),
    );
    $this->db->insert('equipo', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function geteqiSelec()
  {
    $id = $this->input->post('id');
    $this->db->where('idequipo', $id);
    $query = $this->db->get('equipo');
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
  
  public function updateEquipos()
  {
    $id = $this->input->post('idequipo');

    $field = array(
      'adquisicion' => $this->input->post('txtadqui'),
      'serie' => $this->input->post('txtserie'),
      'modelo' => $this->input->post('txtmodelo'),
      'marca' => $this->input->post('txtmarca'),
      'numero' => $this->input->post('txtnumero'),
      'ubicacion' => $this->input->post('txtaula'),
      'fechacompra' => $this->input->post('fecha'),
      'estadoprestamo' => 'D',
      'estadoequipo' => 'A',
      'categoriaid' => $this->input->post('categoria'),
    );
    $this->db->where('idequipo', $id);
    $this->db->update('equipo', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function getEquipos()
  {
    $this->db->order_by('idequipo', 'asc');
    $query = $this->db->get('equipo');
    return $query->result();
  }

  ////-------------------------->
  public function desactivado()
  {
    $id = $this->input->post('delete');
    $field = array(
      'estadoequipo' => 'I',
    );
    $this->db->where('idequipo', $id);
    $this->db->update('equipo', $field);
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
      'estadoequipo' => 'A',
    );
    $this->db->where('idequipo', $id);
    $this->db->update('equipo', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function getNom($idcategoria)
  {
    $this->db->select('equipo.*,categoria.*');
    $this->db->from('categoria');
    $this->db->join('equipo', 'equipo.categoriaid = categoria.idcategoria');
    $this->db->where('categoria.idcategoria', $idcategoria);
    $this->db->order_by('equipo.numero', 'asc');
    $query = $this->db->get();
    return $query->result();
  }

  public function ocupar($id)
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

  public function anula()
  {
    $id = $this->input->post('delete');
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

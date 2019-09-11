<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mdetallepre extends CI_Model
{
    public function getDetalles()
    {
        $this->db->order_by('iddetalle', 'asc');
        $query = $this->db->get('detalleprestamo');
        return $query->result();
    }

    public function getD()
    {
        $id = $this->input->post('id');
        $this->db->where('iddetalle', $id);
        $query = $this->db->get('detalleprestamo');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
}

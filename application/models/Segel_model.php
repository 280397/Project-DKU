<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Segel_model extends CI_Model
{

    function select()
    {
        //  $this->db->order_by('CustomerID', 'DESC');
        $query = $this->db->get('segels');
        return $query;
    }

    function insertimport($data)
    {
        $this->db->insert_batch('segels', $data);
        return $this->db->insert_id();
    }

    public function get()
    {
        $this->db->select('segels.*');
        // $this->db->join('positions', 'users.id_position=positions.id_position');
        // $this->db->join('locations', 'users.id_location=locations.id_location');
        $this->db->from('segels');

        $query = $this->db->get();

        return $query;
    }
    public function getType()
    {
        $this->db->select('segels_type.*');
        // $this->db->join('positions', 'users.id_position=positions.id_position');
        // $this->db->join('locations', 'users.id_location=locations.id_location');
        $this->db->from('segels_type');

        $query = $this->db->get();

        return $query;
    }
}

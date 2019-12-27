<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function get_count()
    {
        $count = "SELECT count(barcode) as stok from barang";
        $result = $this->db->query($count);
        // return $result->row()->stok;
    }
    public function getUser()
    {
        $this->db->select('users.*,positions.position as id_position, locations.location as id_location');
        $this->db->join('positions', 'users.id_position=positions.id_position');
        $this->db->join('locations', 'users.id_location=locations.id_location');
        $this->db->from('users');

        $query = $this->db->get();

        return $query;
    }


    // edit 
    public function getId($id = null)
    {
        $this->db->from('users');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function getIdRole($id = null)
    {

        $this->db->from('users_role');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function getIdActive($id = null)
    {

        $this->db->from('activation');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function edit($post)
    {
        $data = [
            'name' => $post['name'],
            'email' => $post['email'],
            'role_id' => $post['role_id'],
            'is_active' => $post['is_active']
        ];

        $this->db->where('id', $post['id']);
        $this->db->update('users', $data);
    }

    // hapus user model
    public function hapusUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users', ['id' => $id]);
    }
}

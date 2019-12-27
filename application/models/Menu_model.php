<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getMenuM()
    {
        $this->db->from('users_menu');
        $query = $this->db->get();
        return $query;
    }
    public function getSubMenu()
    {
        $query = "SELECT `users_sub_menu`.*, `users_menu`.`menu`
                    FROM `users_sub_menu` JOIN `users_menu`
                    ON `users_sub_menu`.`menu_id` = `users_menu`.`id`
                    ";
        return $this->db->query($query)->result_array();
    }


    // edit menu
    public function getMenu($id)
    {
        return $this->db->get_where('users_menu', ['id' => $id])->row_array();
    }
    public function ubahMenu()
    {
        $data = [

            "menu" => $this->input->post('menu', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users_menu', $data);
    }



    // hapus menu model
    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users_menu', ['id' => $id]);
    }

    // hapus sub menu model
    public function deleteSubMenu($id)
    {
        // $this->db->where($where);
        $this->db->delete('users_sub_menu', ['id' => $id]);
        // $this->db->delete($table);
    }
}

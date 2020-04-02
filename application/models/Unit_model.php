<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from("p_unit");
        if ($id != null) {
            $this->db->where("unit_id", $id);
        }
        $query =  $this->db->get();
        return $query;
    }
    function del($id)
    {
        $this->db->where("unit_id", $id);
        $this->db->delete("p_unit");
    }

    function add($post)
    {
        $data = [
            'name' => $post['name'],
            'created' => date("Y-m-d h:i:s"),
            'updated' => null
        ];
        $this->db->insert("p_unit", $data);
    }
    function edit($post)
    {
        $data = [
            'name' => $post['name'],
            'updated' => date("Y-m-d h:i:s")
        ];
        $this->db->where("unit_id", $post['id']);
        $this->db->update("p_unit", $data);
    }
}

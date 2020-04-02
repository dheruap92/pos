<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suplier_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from("suplier");
        if ($id != null) {
            $this->db->where("suplier_id", $id);
        }
        $query =  $this->db->get();
        return $query;
    }
    function del($id)
    {
        $this->db->where("suplier_id", $id);
        $this->db->delete("suplier");
    }

    function add($post)
    {
        $data = [
            'name' => $post['name'],
            'phone' => $post['phone'],
            'address' => $post['addr'],
            'description' => empty($post['desc']) ? NULL : $post['desc'],
            'created' => date("Y-m-d h:i:s"),
            'updated' => null
        ];
        $this->db->insert("suplier", $data);
    }
    function edit($post)
    {
        $data = [
            'name' => $post['name'],
            'phone' => $post['phone'],
            'address' => $post['addr'],
            'description' => empty($post['desc']) ? NULL : $post['desc'],
            'updated' => date("Y-m-d h:i:s")
        ];
        $this->db->where("suplier_id", $post['id']);
        $this->db->update("suplier", $data);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from("customer");
        if ($id != null) {
            $this->db->where("customer_id", $id);
        }
        $query =  $this->db->get();
        return $query;
    }
    function del($id)
    {
        $this->db->where("customer_id", $id);
        $this->db->delete("customer");
    }

    function add($post)
    {
        $data = [
            'name' => $post['name'],
            'phone' => $post['phone'],
            'address' => $post['addr'],
            'gender' => $post['gender'],
            'created' => date("Y-m-d h:i:s"),
            'updated' => null
        ];
        $this->db->insert("customer", $data);
    }
    function edit($post)
    {
        $data = [
            'name' => $post['name'],
            'phone' => $post['phone'],
            'address' => $post['addr'],
            'gender' => $post['gender'],
            'updated' => date("Y-m-d h:i:s")
        ];
        $this->db->where("customer_id", $post['id']);
        $this->db->update("customer", $data);
    }
}

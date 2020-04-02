<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function login($post)
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("username", $post['username']);
        $this->db->where("password", sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from("users");
        if ($id != null) {
            $this->db->where("user_id", $id);
        }
        $query =  $this->db->get();
        return $query;
    }

    function add($post)
    {
        $data = [
            "username" => $post["inputUsername"],
            "password" => sha1($post["inputPassword"]),
            "name" => $post["inputName"],
            "address" => $post["inputAddress"],
            "level" => $post["inputLevel"],
        ];
        $this->db->insert("users", $data);
    }
    function edit($post)
    {
        $data = [
            "username" => $post["inputUsername"],
            "name" => $post["inputName"],
            "address" => $post["inputAddress"],
            "level" => $post["inputLevel"],
        ];
        if (!empty($post['inputPassword'])) {
            $data["password"] = sha1($post["inputPassword"]);
        }
        $this->db->where("user_id", $post['inputId']);
        $this->db->update("users", $data);
    }

    function del($id)
    {
        $this->db->where("user_id", $id);
        $this->db->delete("users");
    }
}

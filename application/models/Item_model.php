<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select("p_item.*,p_unit.name as unit_name,p_category.name as category_name");
        $this->db->from("p_item");
        $this->db->join("p_unit", "p_unit.unit_id=p_item.unit_id");
        $this->db->join("p_category", "p_category.category_id=p_item.category_id");
        if ($id != null) {
            $this->db->where("item_id", $id);
        }
        $query =  $this->db->get();
        return $query;
    }
    function del($id)
    {
        $this->db->where("item_id", $id);
        $this->db->delete("p_item");
    }

    function add($post)
    {
        $data = [
            'name' => $post['name'],
            'barcode' => $post['barcode'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'created' => date("Y-m-d h:i:s"),
            'updated' => null,
            'image' => $post["image"]
        ];
        $this->db->insert("p_item", $data);
    }
    function edit($post)
    {
        $data = [
            'name' => $post['name'],
            'barcode' => $post['barcode'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'updated' => date("Y-m-d h:i:s")
        ];
        if ($post['image'] == NULL || $post['image'] == "default.png") {
            $data['image'] = "default.png";
        } else {
            $data['image'] = $post['image'];
        }
        $this->db->where("item_id", $post['id']);
        $this->db->update("p_item", $data);
    }

    function check_barcode($code, $id = null)
    {
        $this->db->from("p_item");
        $this->db->where("barcode", $code);
        if ($id != null) {
            $this->db->where("item_id!=", $id);
        }
        $query = $this->db->get();
        return $query;
    }
}

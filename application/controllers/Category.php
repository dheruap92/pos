<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("category_model", "category");
    }
    public function index()
    {
        $data['row'] = $this->category->get();
        $this->template->load('template_view', 'product/category/category_view', $data);
    }

    public function del($id)
    {
        $this->category->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data berhasil Hapus");
        }
        redirect("category");
    }

    function add()
    {
        $category = new stdClass();
        $category->name = null;
        $category->category_id = null;
        $data = [
            "page" => "add",
            "row" => $category
        ];
        $this->template->load("template_view", 'product/category/category_form', $data);
    }
    function edit($id)
    {

        $query = $this->category->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = [
                "page" => "edit",
                "row" => $category
            ];
        }

        $this->template->load("template_view", 'product/category/category_form', $data);
    }

    function proces()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->category->add($post);
        } else if (isset($_POST['edit'])) {
            $this->category->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data berhasil Disimpan");
        }
        redirect("category");
    }
}

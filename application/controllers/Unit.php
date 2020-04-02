<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("unit_model", "unit");
    }
    public function index()
    {
        $data['row'] = $this->unit->get();
        $this->template->load('template_view', 'product/unit/unit_view', $data);
    }

    public function del($id)
    {
        $this->unit->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data berhasil Hapus");
        }
        redirect("unit");
    }

    function add()
    {
        $unit = new stdClass();
        $unit->name = null;
        $unit->unit_id = null;
        $data = [
            "page" => "add",
            "row" => $unit
        ];
        $this->template->load("template_view", 'product/unit/unit_form', $data);
    }
    function edit($id)
    {

        $query = $this->unit->get($id);
        if ($query->num_rows() > 0) {
            $unit = $query->row();
            $data = [
                "page" => "edit",
                "row" => $unit
            ];
        }

        $this->template->load("template_view", 'product/unit/unit_form', $data);
    }

    function proces()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->unit->add($post);
        } else if (isset($_POST['edit'])) {
            $this->unit->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data berhasil Disimpan");
        }
        redirect("unit");
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Suplier_model", "suplier");
    }
    public function index()
    {
        $data['row'] = $this->suplier->get();
        $this->template->load('template_view', 'suplier/suplier_view', $data);
    }

    public function del($id)
    {
        $this->suplier->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Di Hapus');</script>";
        }
        echo "<script>window.location='" . site_url('suplier') . "'</script>";
    }

    function add()
    {
        $suplier = new stdClass();
        $suplier->suplier_id = null;
        $suplier->name = null;
        $suplier->phone = null;
        $suplier->address = null;
        $suplier->description = null;
        $data = [
            "page" => "add",
            "row" => $suplier
        ];
        $this->template->load("template_view", 'suplier/suplier_form', $data);
    }
    function edit($id)
    {

        $query = $this->suplier->get($id);
        if ($query->num_rows() > 0) {
            $suplier = $query->row();
            $data = [
                "page" => "edit",
                "row" => $suplier
            ];
        }

        $this->template->load("template_view", 'suplier/suplier_form', $data);
    }

    function proces()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->suplier->add($post);
        } else if (isset($_POST['edit'])) {
            $this->suplier->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Di Add/Edit');</script>";
        }
        echo "<script>window.location='" . site_url('suplier') . "'</script>";
    }
}

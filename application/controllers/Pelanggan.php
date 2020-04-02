<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("customer_model", "customer");
    }
    public function index()
    {
        $data['row'] = $this->customer->get();
        $this->template->load('template_view', 'customer/customer_view', $data);
    }

    public function del($id)
    {
        $this->customer->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Di Hapus');</script>";
        }
        echo "<script>window.location='" . site_url('customer') . "'</script>";
    }

    function add()
    {
        $customer = new stdClass();
        $customer->customer_id = null;
        $customer->name = null;
        $customer->phone = null;
        $customer->address = null;
        $customer->gender = null;
        $data = [
            "page" => "add",
            "row" => $customer
        ];
        $this->template->load("template_view", 'customer/customer_form', $data);
    }
    function edit($id)
    {

        $query = $this->customer->get($id);
        if ($query->num_rows() > 0) {
            $customer = $query->row();
            $data = [
                "page" => "edit",
                "row" => $customer
            ];
        }

        $this->template->load("template_view", 'customer/customer_form', $data);
    }

    function proces()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->customer->add($post);
        } else if (isset($_POST['edit'])) {
            $this->customer->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Di Add/Edit');</script>";
        }
        echo "<script>window.location='" . site_url('customer') . "'</script>";
    }
}

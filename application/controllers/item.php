<?php
defined('BASEPATH') or exit('No direct script access allowed');

class item extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("item_model", "item");
        $this->load->model("category_model", "category");
        $this->load->model("unit_model", "unit");
    }
    public function index()
    {
        $data['row'] = $this->item->get();
        $this->template->load('template_view', 'product/item/item_view', $data);
    }

    public function del($id)
    {
        $this->item->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data berhasil Hapus");
            $item = $this->item->get($id)->row();
            if ($item->image != NULL || $item !== "default.png") {
                $target_file = './upload/item/' . $item->image;
                unlink($target_file);
            }
        }
        redirect("item");
    }

    function add()
    {
        $item = new stdClass();
        $item->item_id = null;
        $item->name = null;
        $item->barcode = null;
        $item->price = null;
        $item->category_id = null;

        $category = $this->category->get();
        $query_unit = $this->unit->get();
        $unit[null] = " - Pilih - ";
        foreach ($query_unit->result() as $key => $value) {
            $unit[$value->unit_id] = $value->name;
        }

        $data = [
            "page" => "add",
            "row" => $item,
            "category" => $category,
            "unit" => $unit,
            "selected_unit" => null
        ];
        $this->template->load("template_view", 'product/item/item_form', $data);
    }
    function edit($id)
    {

        $category = $this->category->get();
        $query_unit = $this->unit->get();
        $unit[null] = " - Pilih - ";
        foreach ($query_unit->result() as $key => $value) {
            $unit[$value->unit_id] = $value->name;
        }

        $query = $this->item->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $data = [
                "page" => "edit",
                "row" => $item,
                "category" => $category,
                "unit" => $unit,
                "selected_unit" => $item->unit_id
            ];
        }

        $this->template->load("template_view", 'product/item/item_form', $data);
    }

    function proces()
    {
        // config upload
        $config['upload_path'] = './upload/item';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 1000;
        $config['max_height'] = 768;
        $config['file_name'] = "item-" . date("ymd") . substr(md5(rand()), 0, 10);
        $this->load->library("upload", $config);

        // Post dari form
        $post = $this->input->post(null, TRUE);

        if (isset($_POST['add'])) {
            if ($this->item->check_barcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata("error", "Barcode dengan Code $post[barcode] sudah digunakan");
                redirect("item/add");
            } else {
                if (@$_FILES["image"]['name'] != NULL) {
                    if ($this->upload->do_upload("image")) {
                        $post["image"] = $this->upload->data("file_name");
                        $this->item->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata("success", "Data Berhasil Disimpan");
                        }
                        redirect("item");
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata("error", $error);
                        redirect("item/add");
                    }
                } else {
                    $post["image"] = "default.png";
                    $this->item->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata("success", "Data Berhasil Disimpan");
                    }
                    redirect("item");
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->item->check_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata("error", "Barcode dengan Code $post[barcode] sudah digunakan");
                redirect("item/edit/$post[id]");
            } else {
                if (@$_FILES["image"]['name'] != NULL) {
                    if ($this->upload->do_upload("image")) {
                        $item = $this->item->get($post['id'])->row();
                        if ($item->image != NULL || $item !== "default.png") {
                            $target_file = './upload/item/' . $item->image;
                            unlink($target_file);
                        }
                        $post["image"] = $this->upload->data("file_name");
                        $this->item->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata("success", "Data Berhasil Disimpan");
                        }
                        redirect("item");
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata("error", $error);
                        redirect("item/edit/$post[id]");
                    }
                } else {
                    $post["image"] = "default.png";
                    $this->item->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata("success", "Data Berhasil Disimpan");
                    }
                    redirect("item");
                }
            }
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data berhasil Disimpan");
        }
    }

    function barcode_qrcode($id)
    {
        $data['row'] = $this->item->get($id)->row();
        $data['page'] = "Tampil";
        $this->template->load("template_view", 'product/item/barcode_qrcode', $data);
    }

    function barcode_print($id)
    {
        $data['row'] = $this->item->get($id)->row();
        $html = $this->load->view("product/item/barcode_print", $data, true);
        $this->fungsi->PdfGenerator($html, 'coba', 'A4', "landscape");
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('Users_model', 'users');
        $this->load->library("form_validation");
    }

    public function index()
    {
        $data['user'] = $this->users->get();
        $this->template->load("template_view", 'user/user_view', $data);
    }

    function add()
    {

        $this->form_validation->set_rules("inputName", "Name", 'required');
        $this->form_validation->set_rules("inputUsername", "Username", 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules("inputPassword", "Password", 'required|min_length[5]');
        $this->form_validation->set_rules("inputPasswordConf", "Password Confirmasi", 'required|matches[inputPassword]', [
            "matches" => "%s Tidak Sesuai dengan Password"
        ]);
        $this->form_validation->set_rules("inputLevel", "Level", 'required');
        $this->form_validation->set_message([
            "is_unique" => "Username sudah ada",
            "required" => "File masih kosong"
        ]);
        if ($this->form_validation->run() == false) {
            $this->template->load("template_view", 'user/user_form_add');
        } else {
            $post = $this->input->post(null, true);
            $this->users->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil di Simpan');</script>";
            }
            echo "<script>window.location = '" . site_url("user") . "'</script>";
        }
    }

    function del()
    {
        $id = $this->input->post("user_id");
        $this->users->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Di Hapus');</script>";
        }
        echo "<script>window.location='" . site_url('user') . "'</script>";
    }

    function edit($id)
    {
        $this->form_validation->set_rules("inputName", "Name", 'required');
        $this->form_validation->set_rules("inputUsername", "Username", 'required|min_length[5]|callback_username_check');

        if ($this->input->post("inputPassword")) {
            $this->form_validation->set_rules("inputPassword", "Password", 'required|min_length[5]');
            $this->form_validation->set_rules("inputPasswordConf", "Password Confirmasi", 'required|matches[inputPassword]', [
                "matches" => "%s Tidak Sesuai dengan Password"
            ]);
        }

        if ($this->input->post("inputPasswordConf")) {
            $this->form_validation->set_rules("inputPasswordConf", "Password Confirmasi", 'required|matches[inputPassword]', [
                "matches" => "%s Tidak Sesuai dengan Password"
            ]);
        }
        $this->form_validation->set_rules("inputLevel", "Level", 'required');
        $this->form_validation->set_message([
            "is_unique" => "Username sudah ada",
            "required" => "File masih kosong"
        ]);
        if ($this->form_validation->run() == false) {
            $query = $this->users->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load("template_view", 'user/user_form_edit', $data);
            } else {
                echo "<script>alert('Data Tidak Ditemukan');";
                echo "window.location = '" . site_url("user") . "'</script>";
            }
        } else {
            $post = $this->input->post(null, true);
            $this->users->edit($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil di Update');</script>";
            }
            echo "<script>window.location = '" . site_url("user") . "'</script>";
        }
    }

    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM users where username='$post[inputUsername]' AND user_id!='$post[inputId]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message("username_check", "{field} Sudah Ada");
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

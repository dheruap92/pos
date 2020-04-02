<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auths extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Setting_model", "setting");
    }
    public function index()
    {
        check_already_login();
        $this->load->view("login_view");
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model("Auths_model", "auth");
            $query = $this->auth->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $param = [
                    "username" => $row->username,
                    "userid" => $row->user_id,
                    "level" => $row->level,
                ];
                $this->session->set_userdata($param);
                echo "<script>
                    window.location='" . site_url("dashboard") . "';
                </script>";
            } else {
                $this->session->set_flashdata("msg", "<div class='alert alert-danger'>Wrong Username and Password</div>");
                echo "<script>
                    window.location='" . site_url("auths") . "';
                </script>";
            }
        } else {
            echo "Gagal Login";
        }
    }

    public function logout()
    {
        $params = ['userid', 'level', 'username'];
        $this->session->unset_userdata($params);
        redirect("auths");
    }
}

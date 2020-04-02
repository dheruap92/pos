<?php

class Fungsi
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model("Auths_model", 'auths');
        $userid = $this->ci->session->userdata('userid');
        $userdata = $this->ci->auths->get($userid)->row();;
        return $userdata;
    }

    function apps()
    {
        $this->ci->load->model("Setting_model", 'setting');
        return $this->ci->setting->get_setting();
    }
}

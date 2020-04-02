<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends CI_Model
{
    public function get_setting()
    {
        return $this->db->get("set_apps")->row();
    }
}

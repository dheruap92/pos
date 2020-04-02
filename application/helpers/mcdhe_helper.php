<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if (!$user_session) {
        redirect('auths');
    }
}

function check_admin()
{
    $ci = &get_instance();
    if ($ci->fungsi->user_login()->level != 1) {
        redirect("dashboard");
    }
}

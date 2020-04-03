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

    function PdfGenerator($html, $filename, $paper, $orientation)
    {

        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
    }
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' => 'Laporan Penjualan',
            'isi' => 'v_laporan',        
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        
    }


}

/* End of file Controllername.php */

<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['header'] = $this->load->view('header', NULL, TRUE);
        // $data['header'] = view('templates/header');
        // $data['footer'] = view('templates/footer');
        $this->load->view ('home', $data);
    }
}

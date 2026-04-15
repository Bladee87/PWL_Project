<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        return view('templates/head') 
            .view('templates/sidebar') 
            .view('templates/topbar') 
            .view('templates/content') 
            .view('templates/footer');
    }
}

?>
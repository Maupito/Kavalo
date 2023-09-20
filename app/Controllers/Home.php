<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('Accueil');
    }
    
    public function register()
    {
            return view('register');
    }

    public function login()
    {
            return view('logs/login');
    }
}

<?php

namespace App\Controllers;

class LogController extends BaseController
{

    public function register()
    {
            return view('logs/register');
    }

    public function login()
    {
            return view('logs/login');
    }
}
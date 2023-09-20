<?php

namespace App\Controllers;

use App\Models\VoitureModel;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [];
        $session = session();
        if ($session->has('user_id') && $session->has('user_first_name')) {
            $data['userFirstName'] = $session->get('user_first_name');
        }
        
        return view('home', $data);
    }

    public function voitures()
    {
        return view('voitures');
    }
}

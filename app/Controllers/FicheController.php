<?php

namespace App\Controllers;

use App\Models\VoitureNeuveModel;
use App\Models\VoitureOccasionModel;

class FicheController extends BaseController
{
    public function occasion()
    {
        $VoitureOccasionModel = new VoitureOccasionModel();
        $occasion = $VoitureOccasionModel->findAll();
    
        return view('occasion', ['voitures' => $occasion]);
    }
    
    public function neuf()
    {
        $VoitureNeuveModel = new VoitureNeuveModel();
        $neuf = $VoitureNeuveModel->findAll();
    
        return view('neuf', ['voitures' => $neuf]);
    }
    
    
}

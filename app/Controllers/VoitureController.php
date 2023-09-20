<?php

namespace App\Controllers;

use App\Models\VoitureModel;
use App\Models\VoitureOccasionModel;
use App\Models\VoitureNeuveModel;

class VoitureController extends BaseController
{
    public function index()
    {
        $voitureModel = new VoitureModel();
        $data['voitures'] = $voitureModel->findAll();
        return view('home', $data);
    }

    public function voiture($id)
    {
        $voitureModel = new VoitureModel();
        $data['voiture'] = $voitureModel->find($id);
        return view('view', $data);
    }
    public function edit($id)
    {
        $voitureModel = new VoitureModel();
        $voiture = $voitureModel->find($id);
        
        if ($this->request->getMethod(true) === 'POST') {
            $data = [
                'marque' => $this->request->getPost('marque'),
                'modele' => $this->request->getPost('modele'),
                'annee' => $this->request->getPost('annee'),
                'kilometrage' => $this->request->getPost('kilometrage'),
                'carburant' => $this->request->getPost('carburant'),
                'transmission' => $this->request->getPost('transmission'),
                'puissance' => $this->request->getPost('puissance'),
                'prix' => $this->request->getPost('prix'),
                'prix_d_origine' => $this->request->getPost('prix_d_origine'),
                'couleur' => $this->request->getPost('couleur'),
                'description' => $this->request->getPost('description'),
                'equipements' => $this->request->getPost('equipements'),
                'photos' => $this->request->getPost('photos')
            ];
            $voitureModel->update($id, $data);
            return redirect()->to(base_url('occasion'));
        }

        $data['voiture'] = $voiture;
        return view('admin/edit', $data);
    }
    public function deleteCar($id)
{
    $voitureModel = new VoitureModel();
    $voitureModel->delete($id);
    return redirect()->to(base_url('/occasion'));
}

public function add()
{
    $voitureModel = new VoitureModel();
    
    if ($this->request->getMethod(true) === 'POST') {
        $data = [
            'reference' => $this->request->getPost('reference'),
            'marque' => $this->request->getPost('marque'),
            'modele' => $this->request->getPost('modele'),
            'annee' => $this->request->getPost('annee'),
            'kilometrage' => $this->request->getPost('kilometrage'),
            'carburant' => $this->request->getPost('carburant'),
            'transmission' => $this->request->getPost('transmission'),
            'puissance' => $this->request->getPost('puissance'),
            'prix' => $this->request->getPost('prix'),
            'prix_d_origine' => $this->request->getPost('prix_d_origine'),
            'couleur' => $this->request->getPost('couleur'),
            'description' => $this->request->getPost('description'),
            'equipements' => $this->request->getPost('equipements'),
            'photos' => $this->request->getPost('photos')
        ];
        do {
            $randomId = uniqid();
        } while ($voitureModel->find($randomId));
        $data['id'] = $randomId;
        $voitureModel->insert($data);
        return redirect()->to(base_url(''));
    }
    return view('admin/add');
}

}

<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\VoitureModel;
use App\Models\VoitureNeuveModel;
use App\Models\VoitureOccasionModel;
use SimpleXMLElement;

class ImportModel extends Model
{
    public function importDataFromXML()
    {
        $xmlFile = base_url('ressources/vehicules.xml');
        $xml = simplexml_load_file($xmlFile);

        foreach ($xml->voiture as $xmlVoiture) {
            $kilometrage = (int)$xmlVoiture->kilometrage;
            $isNeuf = ($kilometrage === 0);

            $data = [
                'reference' => (string)$xmlVoiture->reference,
                'marque' => (string)$xmlVoiture->marque,
                'modele' => (string)$xmlVoiture->modele,
                'annee' => (int)$xmlVoiture->annee,
                'kilometrage' => (int)$xmlVoiture->kilometrage,
                'carburant' => (string)$xmlVoiture->carburant,
                'transmission' => (string)$xmlVoiture->transmission,
                'puissance' => (int)$xmlVoiture->puissance,
                'prix' => (float)$xmlVoiture->prix,
                'prix_d_origine' => (float)$xmlVoiture->prix_d_origine,
                'couleur' => (string)$xmlVoiture->couleur,
                'description' => (string)$xmlVoiture->description,
            ];

            $equipements = $xmlVoiture->equipements->equipement;
            $equipementsArray = is_array($equipements) ? $equipements : [$equipements];
            $data['equipements'] = implode(', ', $equipementsArray);

            $photos = $xmlVoiture->photos->photo;
            $photosArray = is_array($photos) ? $photos : [$photos];
            $data['photos'] = implode(', ', $photosArray);

            $modelClass = $isNeuf ? 'VoitureNeuveModel' : 'VoitureOccasionModel';
            $voitureModel = new $modelClass();

            $referenceExists = $voitureModel->where('reference', $xmlVoiture->reference)->first();
        
            if (!$referenceExists) {
                $voitureModel->insert($data);
            }
        }

        return true;
    }
}
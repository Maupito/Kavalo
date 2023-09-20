<?php

namespace App\Models;

use CodeIgniter\Model;

class VoitureModel extends Model
{
    protected $table = '';
    protected $primaryKey = 'id';
    protected $allowedFields = ['reference', 'marque', 'modele', 'annee', 'kilometrage', 'carburant', 'transmission', 'puissance', 'prix', 'prix_d_origine', 'couleur', 'description', 'equipements', 'photos'];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateursModel extends Model
{
    protected $DBGroup = 'utilisateurs';
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nom', 'prenom', 'email', 'password', 'admin'];
    public function registerUser($nom, $prenom, $email, $password, $admin)
    {
        $data = [
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'admin' => $admin,
        ];
        $this->db->table($this->table)->insert($data);

        return $this->db->insertID();
    }
    public function getUserByEmail($email)
    {
        return $this->db->table($this->table)->select('id, password, prenom, nom, admin')->where('email', $email)->get()->getRowArray();
    }

    public function checkEmailExistence($email)
{
    $user = $this->db->table($this->table)->where('email', $email)->get()->getRowArray();
    return $user !== null;
}
}
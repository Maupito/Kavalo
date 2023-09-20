<?php

namespace App\Controllers;

use App\Models\UtilisateursModel;

class LogController extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UtilisateursModel();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->processRegistration();
            return $result;
        } else {
            return view('logs/register');
        }
    }

    private function processRegistration()
    {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $rpassword = $_POST['rpassword'] ?? '';
        $admin = $_POST[0] ?? '';

        if ($password !== $rpassword) {
            return;
        }

        if ($this->userModel->checkEmailExistence($email)) {
            echo "L'adresse email existe déjà. Veuillez utiliser une autre adresse email.";
            return;
        }

        $userId = $this->userModel->registerUser($nom, $prenom, $email, $password, $admin);

        if ($userId) {
            return redirect()->to(site_url('login'));
        } else {
            echo "L'inscription a échoué. Veuillez réessayer.";
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->processLogin();
            return $result;
        } else {
            return view('logs/login');
        }
    }

    private function processLogin()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            return view('logs/login', ['error' => 'Email and password are required.']);
        }
        $user = $this->userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session()->set('user_id', $user['id']);
            session()->set('user_first_name', $user['prenom']);
            session()->set('user_admin', $user['admin']);
            return redirect()->to(base_url(''));
        } else {
            return view('logs/login', ['error' => 'Invalid email or password. Please try again.']);
        }
    }
    public function logout()
        {
            $session = session();
            $session->remove('user_id');
            $session->remove('user_first_name');
            $session->remove('user_admin');
            return redirect()->to(base_url(''));
        }
}
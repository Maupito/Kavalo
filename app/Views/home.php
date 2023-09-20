<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
<body>
    <img src="https://images.hdqwalls.com/download/2019-bugatti-la-voiture-noire-4k-ww-2560x1024.jpg" alt="" class="banderole">
    <div class="navbar">
        <a href="<?= base_url('') ?>">
            <img src="<?= base_url('ressources/Logo_concession.png') ?>" alt="Logo">
</a>
        <nav>
            <ul>
                <li><a href="<?= base_url('') ?>">Accueil</a></li>
                <li>
                    <a href="<?= base_url('voitures') ?>">Voitures</a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('occasion') ?>">Occasion</a></li>
                        <li><a href="<?= base_url('neuf') ?>">Neuf</a></li>
                    </ul>
                </li>
                <div class="user-info">
                    <?php $userFirstName = session('user_first_name');
                     if (isset($userFirstName)) { ?>
                        <p>Bonjour, <?= $userFirstName ?> !
                        <a href="<?= base_url('logout') ?>">Déconnexion</a>
                    <?php } else { ?>
                        <a href="<?= base_url('login') ?>">Connexion</a>
                        <a href="<?= base_url('register') ?>">Inscription</a>
                    <?php } ?>
                </div>
            </ul>
        </nav>
    </div>
</body>
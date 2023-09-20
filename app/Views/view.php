<!DOCTYPE html>
<html>
    <head>
        <title>Modifier une voiture</title>
        <style>
            .content {
                display: flex;
                flex-direction: column;
            }

            .field {
                margin-bottom: 10px;
            }

            /* Style pour les étiquettes */
            .label-text {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
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
        <div class="content">
            <form method="post" action="<?php echo base_url('index.php/edit/' . $voiture['id']); ?>">
                <div class="field">
                    <span class="label-text">Référence :</span>
                    <span><?php echo $voiture['reference']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Marque :</span>
                    <span><?php echo $voiture['marque']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Modèle :</span>
                    <span><?php echo $voiture['modele']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Année :</span>
                    <span><?php echo $voiture['annee']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Kilométrage :</span>
                    <span><?php echo $voiture['kilometrage']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Carburant :</span>
                    <span><?php echo $voiture['carburant']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Transmission :</span>
                    <span><?php echo $voiture['transmission']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Puissance :</span>
                    <span><?php echo $voiture['puissance']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Prix :</span>
                    <span><?php echo $voiture['prix']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Prix d'origine :</span>
                    <span><?php echo $voiture['prix_d_origine']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Couleur :</span>
                    <span><?php echo $voiture['couleur']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Description :</span>
                    <span><?php echo $voiture['description']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Équipements :</span>
                    <span><?php echo $voiture['equipements']; ?></span>
                </div>
                <div class="field">
                    <span class="label-text">Photos :</span>
                    <span><?php echo $voiture['photos']; ?></span>
                </div>
                <?php $useradmin =session('user_admin');
                if ($useradmin==1) { ?>
                <div class="field">
                    <a href="<?= base_URL('/occasion/voiture' . $voiture['id'] . '/edit'); ?>" class="edit-button">Edit</a>
                </div>
                <?php } ?>
            </form>
        </div>
        <a href="<?php echo base_url('occasion'); ?>">
            <button>Retour</button>
        </a>
    </body>
</html>


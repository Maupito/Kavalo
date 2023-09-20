<!DOCTYPE html>
<html>
    <head>
        <title>Liste des voitures</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
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
        <center>
            <div class="content">
                <div class="home"></div>
                <button class="favorites-button" onclick="togglePopup()">Favoris</button>
                <button class="comparateur-button" onclick="toggleComparateur()">Comparateur</button>
                <div class="popup" id="popupContent">
                    <h2>Favoris</h2>
                    <div id="favoritesList" class="cars-popup"></div>
                    <br>
                    <button onclick="togglePopup()">Close</button>
                </div>
                <div class="popup" id="comparateurPopup">
                    <h2>Comparateur</h2>
                    <div id="comparateurList" class="cars-popup"></div>
                    <br>
                    <button onclick="toggleComparateur()">Close</button>
                </div>
                <p>Barre de recherche :
                    <input type="text" id="searchInput"></p>
                <br>
                <label for="filtermarque">Filtrer par marque :</label>
                <select id="filtermarque">
                    <option value="">Toutes les marques</option>
                    <option value="Audi">Audi</option>
                    <option value="BMW">BMW</option>
                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                </select>
                <label for="filterkilometre">Filtrer par kilométrage :</label>
                <select id="filterkilometre">
                    <option value="">Intervalle</option>
                    <option value="0-50000">0-50 000</option>
                    <option value="50000-100000">50 000-100 000</option>
                    <option value="100000+">100 000 et plus</option>
                </select>
                <label for="filtercarburant">Filtrer par carburant :</label>
                <select id="filtercarburant">
                    <option value="">Types de carburants</option>
                    <option value="Essence">Essence</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Electrique">Electrique</option>
                </select>
                <p>Prix maximum :<span id="sliderValue"></span>€<input type="range" min="0" max="100000" value="100000" step="1" id="slider"></p>
                <?php $useradmin =session('user_admin');
                if ($useradmin==1) { ?>
                <a href="<?= base_url('neuf/add'); ?>">
                    <button class="import-button">Ajouter</button>
                </a>
                <a href="<?= base_url('neuf/import'); ?>">
                    <button class="import-button">Import</button>
                </a>
            <?php } ?>
            <div class="cars">
                <?php foreach ($voitures as $voiture): ?>
                    <div class="car" data-id="<?= $voiture['id'] ?>" data-marque="<?= $voiture['marque'] ?>" data-modele="<?= $voiture['modele'] ?>" data-kilometrage="<?= $voiture['kilometrage'] ?>" data-carburant="<?= $voiture['carburant'] ?>" data-prix="<?= $voiture['prix'] ?>" data-puissance="<?= $voiture['puissance'] ?>" data-couleur="<?= $voiture['couleur'] ?>" data-annee="<?= $voiture['annee'] ?>" data-transmission="<?= $voiture['transmission'] ?>">
                            <p>Marque:
                                <?= $voiture['marque'] ?></p>
                            <p>Modèle:
                                <?= $voiture['modele'] ?></p>
                            <p>Kilométrage:
                                <?= $voiture['kilometrage'] ?></p>
                            <p>Carburant:
                                <?= $voiture['carburant'] ?></p>
                            <p>Prix:
                                <?= $voiture['prix'] ?></p>
                            <p>
                                <a href="<?= base_url('neuf/voiture' . $voiture['id']); ?>">
                                    <button class="view-button">Voir plus</button>
                                </a>
                            </p>
                            <?php $useradmin =session('user_admin');
                            if ($useradmin==1) { ?>
                            <form action="<?= base_url('neuf/delete/' . $voiture['id']); ?>" method="post">
                                <button type="submit" class="delete-button">-</button>
                            </form>
                            <?php } ?>
                            <div class="heart-container">
                                <i class="fa-regular fa-heart"></i>
                                <i class="fa-solid fa-heart" style="display: none;"></i>
                            </div>
                            <div class="compa">
                                <i class="fa-solid fa-code-compare"></i>
                                <i class="fa-solid fa-check" style="display: none;"></i>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </center>
        <script src="<?= base_url('js/script.js') ?>"></script>
    </body>
</html>

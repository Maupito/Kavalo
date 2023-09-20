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
    </style>
</head>
<body>
    <div class="content">
    <form method="post" action="<?php echo base_url('add'); ?>">
    <div class="field">
                <label for="marque">Référence :</label>
                <input type="text" name="reference" value="<?= $voiture['reference']; ?>">
            </div>
            <div class="field">
                <label for="marque">Marque :</label>
                <input type="text" name="marque" value="<?= $voiture['marque']; ?>">
            </div>
            <div class="field">
                <label for="modele">Modèle :</label>
                <input type="text" name="modele" value="<?= $voiture['modele']; ?>">
            </div>
            <div class="field">
                <label for="annee">Année :</label>
                <input type="number" name="annee" value="<?= $voiture['annee']; ?>">
            </div>
            <div class="field">
                <label for="kilometrage">Kilométrage :</label>
                <input type="number" name="kilometrage" value="<?= $voiture['kilometrage']; ?>">
            </div>
            <div class="field">
                <label for="carburant">Carburant :</label>
                <input type="text" name="carburant" value="<?= $voiture['carburant']; ?>">
            </div>
            <div class="field">
                <label for="transmission">Transmission :</label>
                <input type="text" name="transmission" value="<?= $voiture['transmission']; ?>">
            </div>
            <div class="field">
                <label for="puissance">Puissance :</label>
                <input type="number" name="puissance" value="<?= $voiture['puissance']; ?>">
            </div>
            <div class="field">
                <label for="prix">Prix :</label>
                <input type="number" name="prix" value="<?= $voiture['prix']; ?>">
            </div>
            <div class="field">
                <label for="prix_d_origine">Prix d'origine :</label>
                <input type="number" name="prix_d_origine" value="<?= $voiture['prix_d_origine']; ?>">
            </div>
            <div class="field">
                <label for="couleur">Couleur :</label>
                <input type="text" name="couleur" value="<?= $voiture['couleur']; ?>">
            </div>
            <div class="field">
                <label for="description">Description :</label>
                <textarea name="description"><?= $voiture['description']; ?></textarea>
            </div>
            <div class="field">
                <label for="equipements">Équipements :</label>
                <textarea name="equipements"><?= $voiture['equipements']; ?></textarea>
            </div>
            <div class="field">
                <label for="photos">Photos :</label>
                <textarea name="photos"><?= $voiture['photos']; ?></textarea>
            </div>
            <div class="field">
                <button type="submit">Ajouter la voiture</button>
            </div>
        </form>
        <a href="<?= base_url('/occasion'); ?>">
            <button>Retour</button>
        </a>
    </div>
</body>
</html>

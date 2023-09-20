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
    <form method="post" action="<?php echo base_url('occasion/voiture' . $voiture['id'] . '/edit'); ?>">
    <div class="field">
                <label for="marque">Référence :</label>
                <input type="text" name="reference" value="<?php echo $voiture['reference']; ?>">
            </div>
            <div class="field">
                <label for="marque">Marque :</label>
                <input type="text" name="marque" value="<?php echo $voiture['marque']; ?>">
            </div>
            <div class="field">
                <label for="modele">Modèle :</label>
                <input type="text" name="modele" value="<?php echo $voiture['modele']; ?>">
            </div>
            <div class="field">
                <label for="annee">Année :</label>
                <input type="number" name="annee" value="<?php echo $voiture['annee']; ?>">
            </div>
            <div class="field">
                <label for="kilometrage">Kilométrage :</label>
                <input type="number" name="kilometrage" value="<?php echo $voiture['kilometrage']; ?>">
            </div>
            <div class="field">
                <label for="carburant">Carburant :</label>
                <input type="text" name="carburant" value="<?php echo $voiture['carburant']; ?>">
            </div>
            <div class="field">
                <label for="transmission">Transmission :</label>
                <input type="text" name="transmission" value="<?php echo $voiture['transmission']; ?>">
            </div>
            <div class="field">
                <label for="puissance">Puissance :</label>
                <input type="number" name="puissance" value="<?php echo $voiture['puissance']; ?>">
            </div>
            <div class="field">
                <label for="prix">Prix :</label>
                <input type="number" name="prix" value="<?php echo $voiture['prix']; ?>">
            </div>
            <div class="field">
                <label for="prix_d_origine">Prix d'origine :</label>
                <input type="number" name="prix_d_origine" value="<?php echo $voiture['prix_d_origine']; ?>">
            </div>
            <div class="field">
                <label for="couleur">Couleur :</label>
                <input type="text" name="couleur" value="<?php echo $voiture['couleur']; ?>">
            </div>
            <div class="field">
                <label for="description">Description :</label>
                <textarea name="description"><?php echo $voiture['description']; ?></textarea>
            </div>
            <div class="field">
                <label for="equipements">Équipements :</label>
                <textarea name="equipements"><?php echo $voiture['equipements']; ?></textarea>
            </div>
            <div class="field">
                <label for="photos">Photos :</label>
                <textarea name="photos"><?php echo $voiture['photos']; ?></textarea>
            </div>
            <div class="field">
                <button type="submit">Sauvegarder les modifications</button>
            </div>
        </form>
        <a href="<?php echo base_url('occasion'); ?>">
            <button>Retour</button>
        </a>
    </div>
</body>
</html>

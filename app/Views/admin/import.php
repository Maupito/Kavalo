<!DOCTYPE html>
<html>
<head>
    <title>Importation des données</title>
</head>
<body>
    <center>
    <h1>Importation des données à partir du fichier XML</h1>

    <?php if ($importStatus === true): ?>
        <p>Les données ont été importées avec succès !</p>
    <?php elseif ($importStatus === false): ?>
        <p>Une erreur s'est produite lors de l'importation des données.</p>
    <?php endif; ?>

    <form action="" method="post">
        <button type="submit">Cliquez ici pour importer les données</button>
    </form>
    <br>
    <a href="javascript:void(0);" onclick="history.back();">Retour</a>
        </a>
    </center>
</body>
</html>

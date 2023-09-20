<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        </div>
        <div class="content">
            <h2>Register</h2>

            <?php if (isset($error) && !empty($error)): ?>
                <p style="color: red;"><?= $error ?></p>
            <?php endif; ?>

            <form method="post" action="">
                <input type="hidden" name="type" value="register">
                <input type="text" name="nom" placeholder="Nom" required>
                <br>
                <input type="text" name="prenom" placeholder="Prénom" required>
                <br>
                <input type="email" name="email" placeholder="Email" required>
                <br>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <br>
                <input type="password" name="rpassword" placeholder="Confirmation" required>
                <br>
                <input type="submit" name="submit" value="Register">
                <br>
                <a href="<?= base_url('login') ?>">Déjà membre ? Login</a>
            </form>
        </div>
    </body>
</html>
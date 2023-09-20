<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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
                        <a href="<?= base_url('login') ?>">Connexion</a>
                        <a href="<?= base_url('register') ?>">Inscription</a>
                </div>
            </ul>

        </nav>
        </div>
        <div class="content">
            <h2>Login</h2>

            <?php if (isset($error) && !empty($error)): ?>
                <p style="color: red;"><?= $error ?></p>
            <?php endif; ?>

            <form method="post" action="<?= base_url('login') ?>">
                <input type="email" name="email" placeholder="Email" required>
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <input type="submit" name="submit" value="Login">
                <br>
                <a href="<?= base_url('register') ?>">Not a member? Register</a>
            </form>
        </div>
    </body>
</html>
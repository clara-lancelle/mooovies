<!DOCTYPE html>
<html lang="fr-FR">

    <head>
        <meta charset="utf-8">
        <link rel="icon" href="assets/img/favicon.png" type="image/png">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="style.css">
        <title>
            Mooovies -
            <?php echo isset($title) ? $title : 'here'; ?>
        </title>
    </head>

    <body>
        <header class="nav_ban">
            <div class="navbar">
                <figure class="navbar__logo">
                    <a id="home_link" href="/home" title="lien vers la page d'accueil">
                        <img class="logo" src="/assets/img/logo.png" alt="logo">
                    </a>
                </figure>
                <nav class="navbar__items" role="navigation" id="menu">
                    <ul>
                        <li class="navbar__items__link">
                            <h1>Moovies</h1>
                        </li>
                       <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
                        <li class="navbar__items__link">
                            <a href="/user/logout" title="logout">
                                Logout
                            </a>
                        </li>
                        <?php else : ?>
                            <li class="navbar__items__link">
                            <a href="/user/login" title="Login">
                                Login
                            </a>
                            <p>|</p>
                            <a href="/user/register" title="Register">
                                Register
                            </a>
                        </li>
                            <?php endif; ?>
                        <li class="navbar__items__link">
                            <a href="/movie/displayMovies" title="see all movies">
                                All movies
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

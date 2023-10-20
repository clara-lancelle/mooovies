<!DOCTYPE html>
<html lang="fr-FR">

    <head>
        <meta charset="utf-8">
        <link rel="icon" href="assets/img/favicon.png" type="image/png">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/main.css">
        <title>
            Mooovies -
            <?php echo isset($title) ? $title : 'here'; ?>
        </title>
    </head>

    <body>
        <header class="nav_ban">
            <div class="navbar">
                <a class="navbar__logo" id="home_link" href="/home" title="link to homepage">
                    <img class="logo" src="/assets/img/logo.png" alt="logo">
                    <h1>MOOOVIES</h1>
                </a>
                <nav class="navbar__items" role="navigation" id="menu">
                    <ul>
                        <li class="navbar__items__link">
                            <a href="/movie/displayMovies" title="see all movies">
                                All movies
                            </a>
                        </li>
                        <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
                        <li class="navbar__items__link">
                            <a href="/movie/addMovie" title="addMovie">
                                Add a movie
                            </a>
                        </li>
                        <li class="navbar__items__link">
                            <a href="/movie/dashboard" title="dashboard">
                                dashboard
                            </a>
                        </li>
                        <li class="navbar__items__link">
                            <a href="/user/logout" title="logout">
                                Logout
                            </a>
                        </li>
                        <li class="username">
                            <?= $_SESSION['user'] ?>
                        </li>
                        <?php else : ?>
                        <p class="divider">|</p>
                        <li class="navbar__items__link">
                            <a href="/user/login" title="Login">
                                Login
                            </a>
                        </li>
                        <li class="navbar__items__link">
                            <a href="/user/register" title="Register">
                                Register
                            </a>
                        </li>
                            <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </header>

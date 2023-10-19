<?php

namespace Controller;

use src\Queries\MovieQueries;
use Model\Movie;

class MovieController
{
    public function __invoke()
    {
        $title = 'Accueil';
        header('location:/home');
        return;
    }

    public function displayMovies(): array
    {
        $arrayMovies = MovieQueries::getMovies();
        $title = 'All mooovies';
        include(__DIR__ . '/../view/displayMovies.php');
        return $arrayMovies;
    }

    public function displaySingleMovie(): array
    {
        if (isset($_GET['movieId'])) {
            $movie = new Movie;
            $movie->setId((int) $_GET['movieId']);
            $arrayMovie = MovieQueries::getSingleMovie($movie);
            if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === $arrayMovie['author_id']) {
                $arrayMovie['isAuthor'] = true;
            }

            $title = $arrayMovie['title'];
            include(__DIR__ . '/../view/displaySingleMovie.php');

            return $arrayMovie;

        }
        $this->displayMovies();
        exit;
    }
    public function editMovie(): array
    {
        if (isset($_GET['movieId'])) {
            $movie = new Movie;
            $movie->setId((int) $_GET['movieId']);
            $arrayMovie = MovieQueries::getSingleMovie($movie);
            if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === $arrayMovie['author_id']) {

                $title = 'Edit - ' . $arrayMovie['title'];
                include(__DIR__ . '/../view/editMovie.php');

                return $arrayMovie;
            }
        }
        $this->displayMovies();
        exit;

    }

}
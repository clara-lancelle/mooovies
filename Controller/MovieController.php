<?php

namespace Controller;

use src\Queries\{MovieQueries, CategoryQueries, UserQueries};
use Model\{Movie, User};
use src\Validation\MovieValidation;

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

    public function dashboard(): array|false
    {
        if (isset($_SESSION['user'])) {
            $user = (new User())->setUsername($_SESSION['user']);
            $arrayMovies = MovieQueries::getUserMovieList($user);
            $title = 'Your movie list';
            include(__DIR__ . '/../view/dashboard.php');
            return $arrayMovies;
        } else {
            header("location: /home");
            return false;
        }

    }

    public function displaySingleMovie(): array
    {
        if (isset($_GET['movieId']) && is_int(intval($_GET['movieId']))) {
            $arrayMovie = MovieQueries::getSingleMovie($_GET['movieId']);
            $title = $arrayMovie['title'];
            include(__DIR__ . '/../view/displaySingleMovie.php');

            return $arrayMovie;
        }
        $this->displayMovies();
        exit;
    }
    public function addMovie(): array|false
    {
        $formErrors = [];
        $categories = CategoryQueries::getCategories();
        if (count($_POST) > 0) {
            $authorId = UserQueries::getUserId($_SESSION['user']);
            $formErrors = (new MovieValidation())->validate($_POST, $authorId);
            if (count($formErrors) === 0) {
                $movie = new Movie(
                    $_POST['title'],
                    $authorId,
                    $_POST['producer'],
                    $_POST['synopsis'],
                    intval($_POST['category_id']),
                    $_POST['scenarist'],
                    $_POST['production_company'],
                    $_POST['release_year'],
                    // $_POST['poster']
                );

                $id = MovieQueries::addMovie($movie);
                if ($id) {
                    header("location: /movie/displaySingleMovie?movieId=" . $id);
                }
            }
        }
        $title = 'Add a movie';
        include(__DIR__ . '/../view/addMovie.php');
        return [$formErrors, $categories];
    }
    public function editMovie(): array|false
    {
        $formErrors = [];
        $arrayMovie = [];
        $message = [];
        $categories = CategoryQueries::getCategories();
        if (isset($_GET['movieId'])) {
            $arrayMovie = MovieQueries::getSingleMovie(intval($_GET['movieId']));
            if ($arrayMovie['id'] === $_SESSION['id']) {
                if (count($_POST) > 0) {
                    $authorId = $_SESSION['id'];
                    $validator = new MovieValidation();
                    $formErrors = $validator->validate($_POST, $authorId, $arrayMovie);
                    if (count($formErrors) === 0) {
                        if (count($validator->getFormToChange()) > 0) {
                            foreach ($validator->getFormToChange() as $field => $value) {
                                $type = ($field === 'category_id') ? 'int' : 'str';
                                MovieQueries::updateMovie($arrayMovie['id'], $field, $value, $type);
                                $message = 'Edited !';
                            }
                        }
                    }
                }
                $title = 'Add a movie';
                include(__DIR__ . '/../view/editMovie.php');
                return [$formErrors, $categories, $arrayMovie, $message];
            }
        }

        header("location: /home");
        return false;
    }

    public function deleteMovie()
    {
        if (isset($_GET['movieId']) && isset($_GET['author_id'])) {
            MovieQueries::deleteMovie(intval($_GET['movieId']));
            header("location: /home");
            return;
        }
        header("location: /movie/displaySingleMovie?movieId=" . $$_GET['movieId']);
    }
}
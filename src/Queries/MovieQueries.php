<?php

namespace src\Queries;

use Model\{Movie, Database};

final class MovieQueries extends Database
{
    public static function getMovies(): array
    {
        try {
            $instance = new self;
            $query = 'SELECT m.id, m.title, m.producer, m.synopsis, c.name as category, m.production_company, m.release_year, m.poster
            FROM movie as m
            INNER JOIN category as c
            ON c.id = m.category_id';
            $queryPrepare = $instance->dbco->query($query);
            return $queryPrepare->fetchAll();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function movieAlreadyExist(string $title, int $id)
    {
        try {
            $instance = new self;
            $query = 'SELECT COUNT(id) FROM movie WHERE title = :title AND author_id = :id';
            $queryPrepare = $instance->dbco->prepare($query);
            $queryPrepare->bindValue(':title', $title, \PDO::PARAM_STR);
            $queryPrepare->bindValue(':id', $id, \PDO::PARAM_INT);
            $queryPrepare->execute();
            return $queryPrepare->fetch(\PDO::FETCH_COLUMN);

        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }


    public static function getUserMovieList(object $user): array
    {
        try {
            $instance = new self;
            $query = 'SELECT m.id, m.title, m.producer, m.synopsis, c.name as category, m.production_company, m.release_year, m.poster
            FROM movie as m
            INNER JOIN category as c
            ON c.id = m.category_id
            INNER JOIN user as u
            ON u.id = m.author_id
            WHERE u.username = :username';
            $queryPrepare = $instance->dbco->prepare($query);
            $queryPrepare->bindValue(':username', $user->getUsername(), \PDO::PARAM_STR);
            $queryPrepare->execute();
            $result = $queryPrepare->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getSingleMovie(int $id): array
    {
        try {
            $instance = new self;
            $query = 'SELECT m.id, m.author_id, m.title, m.producer, m.synopsis, c.name as category, m.scenarist, m.production_company, m.release_year, m.poster
                FROM movie as m
                INNER JOIN category as c
                ON c.id = m.category_id
                WHERE m.id = :id';
            $queryPrepare = $instance->dbco->prepare($query);
            $queryPrepare->bindValue(':id', $id, \PDO::PARAM_INT);
            $queryPrepare->execute();
            $result = $queryPrepare->fetchAll(\PDO::FETCH_ASSOC);
            return $result[0];
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function addMovie(object $movie): int|bool
    {
        try {
            $instance = new self;
            $query = 'INSERT INTO movie (title, author_id, producer, synopsis, category_id, scenarist, production_company, release_year)
            VALUES (:title, :author_id, :producer, :synopsis, :categoryId, :scenarist, :production_company, :release_year)';
            $queryPrepare = $instance->dbco->prepare($query);
            $queryPrepare->bindParam(':title', $movie->getTitle(), \PDO::PARAM_STR);
            $queryPrepare->bindParam(':author_id', $movie->getAuthorId(), \PDO::PARAM_INT);
            $queryPrepare->bindParam(':producer', $movie->getProducer(), \PDO::PARAM_STR);
            $queryPrepare->bindParam(':synopsis', $movie->getSynopsis(), \PDO::PARAM_STR);
            $queryPrepare->bindParam(':categoryId', $movie->getCategoryId(), \PDO::PARAM_INT);
            $queryPrepare->bindParam(':scenarist', $movie->getScenarist(), \PDO::PARAM_STR);
            $queryPrepare->bindParam(':production_company', $movie->getProductionCompany(), \PDO::PARAM_STR);
            $queryPrepare->bindParam(':release_year', $movie->getReleaseYear(), \PDO::PARAM_STR);

            return $queryPrepare->execute() ? $instance->dbco->lastInsertId() : false;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function updateMovie(int $id, string $field, string|int $value, string $type): bool
    {
        try {
            $instance = new self;
            $query = "UPDATE movie set $field = :value WHERE movie.id = :id";
            $queryPrepare = $instance->dbco->prepare($query);
            $queryPrepare->bindParam(':value', $value, $type === 'int' ? \PDO::PARAM_INT : \PDO::PARAM_STR);
            $queryPrepare->bindParam(':id', $id, \PDO::PARAM_INT);
            return $queryPrepare->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function deleteMovie(int $id): bool
    {
        try {
            $instance = new self;
            $query = "DELETE FROM movie WHERE id = :id";
            $queryPrepare = $instance->dbco->prepare($query);
            $queryPrepare->bindParam(":id", $id, \PDO::PARAM_INT);
            return $queryPrepare->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
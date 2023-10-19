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

    public static function getSingleMovie(object $movie): array
    {
        try {
            $instance = new self;
            $query = 'SELECT m.id, m.author_id, m.title, m.producer, m.synopsis, c.name as category, m.scenarist, m.production_company, m.release_year, m.poster
                FROM movie as m
                INNER JOIN category as c
                ON c.id = m.category_id
                WHERE m.id = :id';
            $queryPrepare = $instance->dbco->prepare($query);

            $queryPrepare->bindValue(':id', $movie->getId(), \PDO::PARAM_INT);
            $queryPrepare->execute();
            $result = $queryPrepare->fetchAll(\PDO::FETCH_ASSOC);
            return $result[0];
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
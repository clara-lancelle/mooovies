<?php

namespace src\Queries;

use Model\{Movie, Database};

final class CategoryQueries extends Database
{
    public static function getCategories(): array
    {
        try {
            $instance = new self;
            $query = 'SELECT id, name
            FROM category';
            $queryPrepare = $instance->dbco->query($query);
            return $queryPrepare->fetchAll();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
<?php
namespace src\Queries;

use Model\Database;
use Model\User;

final class UserQueries extends Database
{

    public static function isExistingUsername($username): int
    {
        $instance = new self;
        try {
            $query = 'SELECT COUNT(username) FROM `user` WHERE username = :username';
            $queryPrepare = $instance->dbco->prepare($query);
            $queryPrepare->bindValue(':username', $username, \PDO::PARAM_STR);
            $queryPrepare->execute();
            return $queryPrepare->fetch(\PDO::FETCH_COLUMN);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getUserId($username): int
    {
        $instance = new self;
        try {
            $query = 'SELECT id FROM `user` WHERE username = :username';
            $queryPrepare = $instance->dbco->prepare($query);
            $queryPrepare->bindValue(':username', $username, \PDO::PARAM_STR);
            $queryPrepare->execute();
            return $queryPrepare->fetch(\PDO::FETCH_COLUMN);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function CanLogin(string $username, string $pass)
    {
        try {
            $instance = new self;
            $query = 'SELECT password FROM `user` WHERE username = :username';
            $queryPrepare = $instance->dbco->prepare($query);
            $queryPrepare->bindValue(':username', $username, \PDO::PARAM_STR);
            $queryPrepare->execute();
            $passHach = $queryPrepare->fetch(\PDO::FETCH_COLUMN);
            return password_verify($pass, $passHach);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    //Insert 

    public static function registerUser(User $user): void
    {
        try {
            $instance = new self;
            $query = 'INSERT INTO user (`username`,`password`)
        VALUES (:username, :password)';

            $queryPrepare = $instance->dbco->prepare($query);
            $queryPrepare->bindValue(':username', $user->getUsername(), \PDO::PARAM_STR);
            $queryPrepare->bindValue(':password', $user->getPassword(), \PDO::PARAM_STR);
            $queryPrepare->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
<?php

namespace src\Configuration;

final class DatabaseConfiguration
{
    protected const SERVER_NAME = 'localhost';
    protected const DATABASE_NAME = 'dbmooovies';
    protected const USER = 'adminMooovies';
    protected const PASSWORD = 'mooovies';

    public function getServerName()
    {
        return self::SERVER_NAME;
    }
    public function getDatabaseName()
    {
        return self::DATABASE_NAME;
    }
    public function getUser()
    {
        return self::USER;
    }
    public function getPassword()
    {
        return self::PASSWORD;
    }

}
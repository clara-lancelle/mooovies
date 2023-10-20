<?php

namespace src\Validation\Util;

class ValidationUtil
{
    protected static $regex = [];

    // user validation messages
    protected const EMPTY_FIELDS = 'Cannot login with empty field.';
    protected const INCORRECT_LOGIN_VALUES = 'Seems like your login informations are incorrect.';
    protected const USERNAME_ERROR_INVALID = 'Seems like your username is incorrect.';
    protected const USERNAME_ERROR_EMPTY = 'Username field can\'t be empty.';
    protected const USERNAME_ERROR_ALREADY_TAKEN = 'Username is already taken.';
    protected const PASSWORD_ERROR_DIFFERENT = 'Carefull, your passwords are differents.';
    protected const CONFIRMPASSWORD_ERROR_EMPTY = 'Password confirmation field can\'t be empty.';
    protected const PASSWORD_ERROR_EMPTY = 'Password field can\'t be empty.';
    protected const PASSWORD_ERROR_INVALID = 'Your password is incorrect, you need at least 8 letters, 1 uppercase, 1 lowercase, 1 number and 1 special character and it can\'t contains username.';


    // movie validation messages
    protected const TITLE_ERROR_INVALID = 'Invalid title format.';
    protected const TITLE_ERROR_EMPTY = 'Title is required.';

    protected const PRODUCER_ERROR_INVALID = 'Invalid producer format.';
    protected const PRODUCER_ERROR_EMPTY = 'Producer is required.';

    protected const SYNOPSIS_ERROR_INVALID = 'Invalid synopsis format.';
    protected const SYNOPSIS_ERROR_EMPTY = 'Synopsis is required.';

    protected const CATEGORY_ERROR_INVALID = 'Invalid category format.';
    protected const CATEGORY_ERROR_EMPTY = 'Category is required.';

    protected const SCENARIST_ERROR_INVALID = 'Invalid scenarist format.';
    protected const SCENARIST_ERROR_EMPTY = 'Scenarist is required.';

    protected const PRODUCTION_COMPANY_ERROR_INVALID = 'Invalid production company format.';
    protected const PRODUCTION_COMPANY_ERROR_EMPTY = 'Production company is required.';

    protected const RELEASE_YEAR_ERROR_INVALID = 'Invalid release year format.';
    protected const RELEASE_YEAR_ERROR_EMPTY = 'Release year is required.';

    protected const POSTER_ERROR_INVALID = 'Invalid poster URL format.';
    protected const POSTER_ERROR_EMPTY = 'Poster URL is required.';

    protected const MOVIE_ALREADY_EXIST = 'You already add a movie with this name.';

    public function __construct()
    {
        self::$regex = [
            'string' => '/^([A-Za-zÀ-ż0-9\.\,\ \+\-\’\:\!\;\?\/\(\)\'\"]){1,200}$/',
            'int' => '/^[0-4]{1}$/',
            'year' => '/^[0-9]{4}$/',
            'textarea' => '/^[A-Za-zÀ-ż0-9\.\,\ \+\-\’\:\!\;\?\/\(\)\'\"\%]{1,650}$/',
            'username' => '/^([a-zA-ZÀ-ż0-9\-\_\.]){1,50}$/',
            'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%#*?&^])[A-Za-zÀ-ż\d@$!#%*?&^]{8,}$/' // 1+upperCase 1+lowerCase 1+spé 1+number min8
        ];
    }
}
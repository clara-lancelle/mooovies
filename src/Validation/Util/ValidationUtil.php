<?php

namespace src\Validation\Util;

class ValidationUtil
{
    protected static $regex = [];

    protected const EMPTY_FIELDS = 'Cannot login with empty field.';
    protected const INCORRECT_LOGIN_VALUES = 'Seems like your login informations are incorrect.';
    protected const USERNAME_ERROR_INVALID = 'Seems like your username is incorrect.';
    protected const USERNAME_ERROR_EMPTY = 'Username field can\'t be empty.';
    protected const PASSWORD_ERROR_DIFFERENT = 'Carefull, your passwords are differents.';
    protected const CONFIRMPASSWORD_ERROR_EMPTY = 'Password confirmation field can\'t be empty.';
    protected const PASSWORD_ERROR_EMPTY = 'Password field can\'t be empty.';
    protected const PASSWORD_ERROR_INVALID = 'Your password is incorrect, you need at least 8 letters, 1 uppercase, 1 lowercase, 1 number and 1 special character.';

    public function __construct()
    {
        self::$regex = [
            'string' => '/^([A-Za-zÀ-ż0-9\.\,\ \+\-\’\:\!\;\?\/\(\)\'\"]){1,50}$/',
            'price' => '/^[0-9\,\.\ ]{1,5}$/',
            'time' => '/^([0-1][0-9]|2[0-3])[:\.\/(h)\-][0-5][0-9]([:\.\/(h)\-][0-5][0-9]){0,1}$/',
            'textarea' => '/^[A-Za-zÀ-ż0-9\.\,\ \+\-\’\:\!\;\?\/\(\)\'\"\%]{1,650}$/',
            'username' => '/^([a-zA-ZÀ-ż0-9\-\_\.]){1,50}$/',
            'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%#*?&^])[A-Za-zÀ-ż\d@$!#%*?&^]{8,}$/' // 1+upperCase 1+lowerCase 1+spé 1+number min8
        ];
    }
}
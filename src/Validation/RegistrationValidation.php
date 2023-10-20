<?php

namespace src\Validation;

use src\Validation\Util\ValidationUtil;
use src\Queries\{UserQueries};

final class RegistrationValidation extends ValidationUtil
{
    protected array $formErrors = [];
    protected array $formValidData = [];

    public function validate(array $data): array
    {

        //username
        if (!empty($data['username'])) {
            if (preg_match(ValidationUtil::$regex['username'], $data['username'])) {
                if (!UserQueries::isExistingUsername($data['username'])) {
                    $this->formValidData['username'] = trim($data['username']);
                } else {
                    $this->formErrors['username'] = ValidationUtil::USERNAME_ERROR_ALREADY_TAKEN;
                }
            } else {
                $this->formErrors['username'] = ValidationUtil::USERNAME_ERROR_INVALID;
            }
        } else {
            $this->formErrors['username'] = ValidationUtil::USERNAME_ERROR_EMPTY;
        }
        //password
        if (!empty($data['password'])) {
            if (preg_match(ValidationUtil::$regex['password'], $data['password']) && !str_contains($data['password'], $data['username'])) {
                if (!empty($data['confirmPassword']) && $data['confirmPassword'] === $data['password']) {
                    $this->formValidData['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
                } else {
                    $this->formErrors['password'] = $this->formErrors['confirmPassword'] = ValidationUtil::PASSWORD_ERROR_DIFFERENT;
                }
            } else {
                $this->formErrors['password'] = ValidationUtil::PASSWORD_ERROR_INVALID;
            }
        } else {
            $this->formErrors['password'] = ValidationUtil::PASSWORD_ERROR_EMPTY;
        }

        //ConfirmPassword
        if (empty($data['confirmPassword'])) {
            $this->formErrors['confirmPassword'] = ValidationUtil::CONFIRMPASSWORD_ERROR_EMPTY;
        }
        return $this->formErrors;

    }

    public function getFormValidData(): array
    {
        return $this->formValidData;
    }
}
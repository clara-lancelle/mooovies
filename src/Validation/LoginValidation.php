<?php

namespace src\Validation;

use src\Queries\UserQueries;
use src\Validation\Util\ValidationUtil;

final class LoginValidation extends ValidationUtil
{
    protected array $formErrors = [];

    public function validate(array $data): array
    {

        if (!empty($data['username']) && !empty($data['password'])) {
            (UserQueries::isExistingUsername($data['username']) && UserQueries::CanLogin($data['username'], $data['password'])) ?: $this->formErrors['login'] = ValidationUtil::INCORRECT_LOGIN_VALUES;
        } else {
            $this->formErrors['login'] = ValidationUtil::EMPTY_FIELDS;
        }

        return $this->formErrors;
    }
}
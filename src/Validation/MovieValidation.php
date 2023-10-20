<?php

namespace src\Validation;

use src\Validation\Util\ValidationUtil;
use src\Queries\{MovieQueries};

final class MovieValidation extends ValidationUtil
{
    protected array $formErrors = [];

    protected array $formToChange = [];

    public function validate(array $post, int $author_id, array $arrayMovie = []): array
    {
        $fields = [
            'title' => ['regex' => 'string', 'error_empty' => ValidationUtil::TITLE_ERROR_EMPTY, 'error_invalid' => ValidationUtil::TITLE_ERROR_INVALID],
            'producer' => ['regex' => 'string', 'error_empty' => ValidationUtil::PRODUCER_ERROR_EMPTY, 'error_invalid' => ValidationUtil::PRODUCER_ERROR_INVALID],
            'synopsis' => ['regex' => 'textarea', 'error_empty' => ValidationUtil::SYNOPSIS_ERROR_EMPTY, 'error_invalid' => ValidationUtil::SYNOPSIS_ERROR_INVALID],
            'category_id' => ['regex' => 'int', 'error_empty' => ValidationUtil::CATEGORY_ERROR_EMPTY, 'error_invalid' => ValidationUtil::CATEGORY_ERROR_INVALID],
            'scenarist' => ['regex' => 'string', 'error_empty' => ValidationUtil::SCENARIST_ERROR_EMPTY, 'error_invalid' => ValidationUtil::SCENARIST_ERROR_INVALID],
            'production_company' => ['regex' => 'string', 'error_empty' => ValidationUtil::PRODUCTION_COMPANY_ERROR_EMPTY, 'error_invalid' => ValidationUtil::PRODUCTION_COMPANY_ERROR_INVALID],
            'release_year' => ['regex' => 'year', 'error_empty' => ValidationUtil::RELEASE_YEAR_ERROR_EMPTY, 'error_invalid' => ValidationUtil::RELEASE_YEAR_ERROR_INVALID],
            // 'poster' => ['regex' => 'url', 'error_empty' => ValidationUtil::POSTER_ERROR_EMPTY, 'error_invalid' => ValidationUtil::POSTER_ERROR_INVALID],
        ];

        foreach ($fields as $field => $rules) {
            if (!empty($post[$field])) {
                $regex = ValidationUtil::$regex[$rules['regex']];
                if (!preg_match($regex, $post[$field])) {
                    $this->formErrors[$field] = $rules['error_invalid'];
                } elseif (!empty($arrayMovie) && isset($arrayMovie[$field]) && $post[$field] !== $arrayMovie[$field]) {
                    $this->formToChange[$field] = $post[$field];
                }
            } else {
                $this->formErrors[$field] = $rules['error_empty'];
            }
        }
        if (count($this->formErrors) === 0 && empty($arrayMovie)) {
            if (MovieQueries::movieAlreadyExist($_POST['title'], $author_id)) {
                $this->formErrors['movieAlreadyExist'] = ValidationUtil::MOVIE_ALREADY_EXIST;
            }
            ;
        }
        return $this->formErrors;
    }

    public function getFormToChange(): array
    {
        return $this->formToChange;
    }
}
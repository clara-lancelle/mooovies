<?php

namespace src\Validation;

use src\Validation\Util\ValidationUtil;
use Model\EventType;
use src\Queries\{EventTypeQueries, EventQueries};

final class EditEventValidation extends ValidationUtil
{
    protected array $formErrors = [];

    protected array $formToChange = [];

    public function validatePost(array $post, array $arrayEvent): array
    {
        $arrayEvent = $arrayEvent[0];

        //title
        if (!empty($post['title'])) {
            if (preg_match(ValidationUtil::$regex['string'], $post['title'])) {
                if ($post['title'] !== $arrayEvent['title']) {
                    $this->formToChange['title'] = $post['title'];
                }
            } else {
                $this->formErrors['title'] = ValidationUtil::TITLE_ERROR_INVALID;
            }
        } else {
            $this->formErrors['title'] = ValidationUtil::TITLE_ERROR_EMPTY;
        }
        //EventType
        if (!empty($post['eventType'])) {
            $eventType = new EventType;
            $eventType->setId(intval($post['eventType']));
            if (EventTypeQueries::exists($eventType) > 0) {
                if ($post['eventType'] !== $arrayEvent['eventType']) {
                    $this->formToChange['eventType'] = $eventType->getId();
                }
            } else {
                $this->formErrors['eventType'] = ValidationUtil::EVENTTYPE_ERROR_DOESNT_EXISTS;
            }
        } else {
            $this->formErrors['eventType'] = ValidationUtil::EVENTTYPE_ERROR_EMPTY;
        }

        //address
        if (!empty($post['address'])) {
            if (preg_match(ValidationUtil::$regex['address'], $post['address'])) {
                if ($post['address'] !== $arrayEvent['address']) {
                $this->formToChange['address'] = $post['address'];
                }
            } else {
                $this->formErrors['address'] = ValidationUtil::ADDRESS_ERROR_INVALID;
            }
        } else {
            $this->formErrors['address'] = ValidationUtil::ADDRESS_ERROR_EMPTY;
        }

        //zipCode
        if (!empty($post['zipCode'])) {
            if (preg_match(ValidationUtil::$regex['zipCode'], $post['zipCode'])) { //regex
                if ($post['zipCode'] !== $arrayEvent['zipCode']) {
                    $this->formToChange['zipCode'] = $post['zipCode'];
                    }           
                 } else {
                $this->formErrors['zipCode'] = ValidationUtil::ZIPCODE_ERROR_INVALID;
            }
        } else {
            $this->formErrors['zipCode'] = ValidationUtil::ZIPCODE_ERROR_EMPTY;
        }

        //City
        if (isset($post['city']) && !empty($post['city'])) {
            if (preg_match(ValidationUtil::$regex['city'], $post['city'])) {
                if ($post['city'] !== $arrayEvent['city']) {
                    $this->formToChange['city'] = $post['city'];
                }    
            } else {
                $this->formErrors['city'] = ValidationUtil::CITY_ERROR_INVALID;
            }
        } else {
            $this->formErrors['city'] = ValidationUtil::CITY_ERROR_EMPTY;
        }

        //startDate
        if (!empty($post['startDate'])) {
            if (preg_match(ValidationUtil::$regex['date'], $post['startDate'])) {
                if ($post['startDate'] !== $arrayEvent['startDate']) {
                    $startDate = strtotime(date('Y-m-d', strtotime($post['startDate'])));
                } 
            } else {
                $this->formErrors['startDate'] = ValidationUtil::STARTDATE_ERROR_INVALID;
            }
        } else {
            $this->formErrors['startDate'] = ValidationUtil::STARTDATE_ERROR_EMPTY;
        }

        //endDate
        if (!empty($post['endDate'])) {
            if (preg_match(ValidationUtil::$regex['date'], $post['endDate'])) {
                if ($post['endDate'] !== $arrayEvent['endDate']) {
                    $endDate = strtotime(date('Y-m-d', strtotime($post['endDate'])));
                    } 
            } else {
                $this->formErrors['endDate'] = ValidationUtil::ENDDATE_ERROR_INVALID;
            }
        } else {
            $this->formErrors['endDate'] = ValidationUtil::ENDDATE_ERROR_EMPTY;
        }

        //startTime
        if (!empty($post['startTime'])) {
            if (preg_match(ValidationUtil::$regex['time'], $post['startTime'])) {
                if ($post['startTime'] !== $arrayEvent['startTime']) {
                    $this->formToChange['startTime'] = $post['startTime'];
                    } 
            } else {
                $this->formErrors['startTime'] = ValidationUtil::STARTTIME_ERROR_INVALID;
            }
        } else {
            $this->formErrors['startTime'] = ValidationUtil::STARTTIME_ERROR_EMPTY;
        }

        //endTime
        if (!empty($post['endTime'])) {
            if (preg_match(ValidationUtil::$regex['time'], $post['endTime'])) {
                if ($post['endTime'] !== $arrayEvent['endTime']) {
                    $this->formToChange['endTime'] = $post['endTime'];
                    } 
            } else {
                $this->formErrors['endTime'] = ValidationUtil::ENDTIME_ERROR_INVALID;
            }
        } else {
            $this->formErrors['endTime'] = ValidationUtil::ENDTIME_ERROR_EMPTY;
        }

        //startdate sup || equal enddate
        if (isset($startDate) && isset($endDate)) {
            if ($startDate <= $endDate) {
                $this->formToChange['startDate'] = $post['startDate'];
                $this->formToChange['endDate'] = $post['endDate'];
            } else {
                $this->formErrors['startUpperEnd'] = ValidationUtil::STARTDATE_UPPER_ENDDATE;
            }
        }

        //visitorPrice
        if (!empty($post['visitorPrice']) || $post['visitorPrice'] == 0) {
            if (preg_match(ValidationUtil::$regex['price'], $post['visitorPrice'])) {
                if ($post['visitorPrice'] !== $arrayEvent['visitorPrice']) {
                    $this->formToChange['visitorPrice'] = $post['visitorPrice'];
                    }
            } else {
                $this->formErrors['visitorPrice'] = ValidationUtil::VISITORPRICE_ERROR_INVALID;
            }
        } else {
            $this->formErrors['visitorPrice'] = ValidationUtil::VISITORPRICE_ERROR_EMPTY;
        }

        //participationPrice
        if (!empty($post['participationPrice']) || $post['participationPrice'] == 0) {
            if (preg_match(ValidationUtil::$regex['price'], $post['participationPrice'])) {
                if ($post['participationPrice'] !== $arrayEvent['participationPrice']) {
                    $this->formToChange['participationPrice'] = $post['participationPrice'];
                    }
            } else {
                $this->formErrors['participationPrice'] = ValidationUtil::PARTICIPATIONPRICE_ERROR_INVALID;
            }
        } else {
            $this->formErrors['participationPrice'] = ValidationUtil::PARTICIPATIONPRICE_ERROR_EMPTY;
        }

        //description
        if (!empty($post['description'])) {
            if (preg_match(ValidationUtil::$regex['textarea'], $post['description'])) {
                if ($post['description'] !== $arrayEvent['description']) {
                    $this->formToChange['description'] = $post['description'];
                    }
            } else {
                $this->formErrors['description'] = ValidationUtil::DESCRIPTION_ERROR_INVALID;
            }
        } else {
            $this->formErrors['description'] = ValidationUtil::DESCRIPTION_ERROR_EMPTY;
        }
        return $this->formErrors;
    }

    public function getFormToChange(): array
    {
        return $this->formToChange;
    }
}
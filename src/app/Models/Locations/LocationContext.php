<?php

namespace App\Models\Locations;

use App\Validations\IValidator;
use App\Validations\Locations\Domestic;
use App\Validations\Locations\International;
use App\Validations\Locations\Iowa;
use \InvalidArgumentException;

class LocationContext implements IValidator
{
    protected $_location;

    public function __construct(string $location, ?string $start_date_string, ?string $end_date_string)
    {
        switch ($location) {
            case 'Iowa':
                $this->_location = new Iowa($start_date_string, $end_date_string);
                break;
            case 'Domestic':
                $this->_location = new Domestic($start_date_string, $end_date_string);
                break;
            case 'International':
                $this->_location = new International($start_date_string, $end_date_string);
                break;
            default:
                throw new InvalidArgumentException('Invalid location type');
        }
    }

    public function validate()
    {
        return $this->_location->validate();
    }

    public function getValidationStatuses()
    {
        return $this->_location->getValidationStatuses();
    }
}
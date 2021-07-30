<?php


namespace App\Validations\Locations;

use \DateTime;
use App\Validations\IValidator;

abstract class LocationValidator implements IValidator
{
    protected $_start;
    protected $_end;
    protected $_validation_statuses;

    public function __construct(?string $start_date = null, ?string $end_date = null)
    {
        $this->_start = $this->_createFromFormat($start_date);
        $this->_end = $this->_createFromFormat($end_date);
    }

    public function validate()
    {
        $this->_datesAreValid();
    }

    public function getValidationStatuses()
    {
        return $this->_validation_statuses;
    }

    protected function _createFromFormat($date, $format = 'Y-m-d')
    {
        return !empty($date) ? DateTime::createFromFormat($format, $date) : null;
    }

    protected function _dateIsEmpty(?DateTime $date)
    {
        return empty($date);
    }

    protected function _startDateIsEmpty()
    {
        return $this->_dateIsEmpty($this->_start);
    }

    protected function _endDateIsEmpty()
    {
        return $this->_dateIsEmpty($this->_end);
    }

    protected function _endDateIsBeforeStartDate()
    {
        return $this->_dateIsEmpty($this->_end) ? false : $this->_end <= $this->_start;
    }

    abstract protected function _datesAreValid();
}
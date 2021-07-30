<?php


namespace App\Validations\Locations;


class Domestic extends LocationValidator
{

    protected function _datesAreValid()
    {
        $this->_validation_statuses['ERROR_EMPTY_START_DATE'] = $this->_startDateIsEmpty();
        $this->_validation_statuses['ERROR_END_DATE_BEFORE_START_DATE'] = $this->_endDateIsBeforeStartDate();
        $this->_validation_statuses['ERROR_END_DATE_CANNOT_BE_EMPTY'] = $this->_endDateIsEmpty();
        $this->_validation_statuses['ERROR_DOMESTIC_END_DATE_OOB'] = $this->_endDateIsGreaterThanOneYearFromStartDate();
    }

    protected function _endDateIsGreaterThanOneYearFromStartDate()
    {
        if ($this->_dateIsEmpty($this->_start) || $this->_dateIsEmpty($this->_end)) {
            return false;
        }

        $max = clone $this->_start;
        $max->add(new \DateInterval('P1Y'));

        return $this->_end > $max;
    }
}
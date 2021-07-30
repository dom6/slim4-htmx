<?php


namespace App\Validations\Locations;


class International extends LocationValidator
{

    protected function _datesAreValid()
    {
        $this->_validation_statuses['ERROR_EMPTY_START_DATE'] = $this->_startDateIsEmpty();
        $this->_validation_statuses['ERROR_END_DATE_BEFORE_START_DATE'] = $this->_endDateIsBeforeStartDate();
        $this->_validation_statuses['ERROR_END_DATE_CANNOT_BE_EMPTY'] = $this->_endDateIsEmpty();
        $this->_validation_statuses['ERROR_INTERNATIONAL_END_DATE_OOB'] = $this->_endDateIsGreaterThan200DaysFromStartDate();
    }

    protected function _endDateIsGreaterThan200DaysFromStartDate()
    {
        if ($this->_dateIsEmpty($this->_start) || $this->_dateIsEmpty($this->_end)) {
            return false;
        }

        $max = clone $this->_start;
        $max->add(new \DateInterval('P200D'));

        return $this->_end > $max;
    }
}
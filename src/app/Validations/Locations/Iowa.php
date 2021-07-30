<?php


namespace App\Validations\Locations;


class Iowa extends LocationValidator
{

    protected function _datesAreValid()
    {
        $this->_validation_statuses['ERROR_EMPTY_START_DATE'] = $this->_startDateIsEmpty();
        $this->_validation_statuses['ERROR_END_DATE_BEFORE_START_DATE'] = $this->_endDateIsBeforeStartDate();
    }
}
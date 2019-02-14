<?php
    function GetValueAndUnit($value, $unit) 
    {
        if ($value == 0) {
            return "No Info";
        } else {
            return $value . $unit;
        }
    }
    function GetSupport($value) 
    {
        if ($value == 0) {
            return "No Info";
        } else if ($value == 1) {
            return "Support";
        } else {
            return "No Support";
        }
    }

?>


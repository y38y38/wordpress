<?php
    function GetValueAndUnit($value, $unit) 
    {
        if ($value == 0) {
            return "No Info";
        } else {
            return $value . " " . $unit;
        }
    }
    function GetSupport($value) 
    {
        if ($value == 0) {
            return "No Info";
        } else if ($value == 1) {
            return "<span class=\" CheckIcon\"></span>";
        } else {
            return "-";
        }
    }
    function GetCharacter($value) 
    {
        if ($value == NULL) {
            return "No Info";
        } else {
            return $value ;
        }
    }

?>


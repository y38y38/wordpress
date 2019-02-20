<?php
    function InputSpacs (){
                $result  = "<form method= \" post \" >";
                $result .= "<input type = \" text \" name = \" i_name \">";
                $result .= "<input type = \" submit \" value= \" send \">";

                $result .= "</form>";
        return  $result;
    }
    add_Shortcode('InputSpacsCode', 'InputSpacs');
?>


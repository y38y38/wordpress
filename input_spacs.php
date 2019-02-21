<?php
/*
    function MakeSmartphoneTable() {
            $table = array();
            $table = {
                    "i_name", 
                    "i_price", 
                    "i_height", 
                    "i_width", 
                    "i_thickness", 
                    "i_weight_gram", 
                    "i_water_proof", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price", 
                    "i_price" 
            };
        
    }
*/
/*
    function MakeInputForm($input_spac)
    {
         $result  = "<form method= \" post \" >";
         $result .= "<input type = \" text \" name = \" i_name \"><br>";
         $result .= "name    <input type = \" text \" name = \" i_name \"><br>";
         $result .= "price   <input type = \" text \" name = \" i_price \"><br>";
         $result .= "height  <input type = \" text \" name = \" i_height \"><br>";
         $result .= "width   <input type = \" text \" name = \" i_width \"><br>";

         $result .= "<input type = \" submit \" value= \" send \"><br>";

         $result .= "</form>";
         return $result;

    }
*/
    function InputSpacs (){
        $result = GetColumns();
        var_dump($result);
        //$result = MakeInputForm()
        $result = "hello";
        return  $result;
    }
    add_Shortcode('InputSpacsCode', 'InputSpacs');
?>


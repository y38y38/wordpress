<?php

    function MakeInputForm($spac_list)
    {
        $result  = "<form method= \"post\" >";
        $result  .= "<table>";
        $list_num = count($spac_list);
        for ($i = 0; $i < $list_num ;$i ++) {
            $result  .= "<tr>";
            $result  .= "<td>";
            $result  .= $spac_list[$i];
            //var_dump($spac_list[$i]);
            $result  .= "</td>";
            $result  .= "<td>";
            $spac_value_name = "i_" . $spac_list[$i];
            //var_dump($spac_value_name);
            $result  .= "<input type = \"text\" name = \"$spac_value_name\">";
            //$result  .= "$spac_value_name";
            $result  .= "</td>";
            $result  .= "</tr>";

        }
        $result  .= "</table>";
        $result .= "<button type =\"submit\"  name = \"send \">send</button>";
        
        $result .= "</form>";
        /*
        $result = "<form method= \"post\">";
        $result .= "<input type = \"text\" name = \"aa\" >";
        $result .= "<input type = \"submit\" value= \"send\">";

        $result .="</form>";
         */
        return $result;

    }
    function InputSpacePost() {
        var_dump($_POST);
        $field_and_type = GetFieldAndType();
        var_dump($field_and_type);
    }
    function InputSpaceGet() {
        $colums_list = GetColumns();
        $result = MakeInputForm($colums_list );
        return $result;
    }

    function InputSpacs (){
        var_dump($_SERVER["REQUEST_METHOD"]);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = InputSpacePost();
        } else {
            $result = InputSpaceGet();
        }
        return  $result;
    }
    add_Shortcode('InputSpacsCode', 'InputSpacs');
?>


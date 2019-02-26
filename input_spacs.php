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
            $spac_value_name =  $spac_list[$i];
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
        //var_dump($_POST);
        $field_and_type = GetFieldAndType();
        //var_dump($field_and_type);
        $keys = array_keys($_POST);
        //var_dump($keys);
        $spac_size = count($keys) - 1; //delete submit 
        //var_dump($spac_size);
        $insert_data = array();


        //delete id, because id is auto increment
        for ($i = 1; $i < $spac_size ; $i ++) {
        //for ($i = 0; $i < 5 ; $i ++) {

            $int_len = strlen('int');
            $char_len = strlen('char');
            $float_len = strlen('float');
            $data_len = strlen('date');
            $text_len = strlen('text');

            //var_dump($i);
            //var_dump($field_and_type[1][$i]);
            //var_dump($int_len);
            //var_dump($ret);
            if (strncmp( $field_and_type[1][$i] , 'int', $int_len) == 0) {
                //print("1");
                $insert_data[$keys[$i]] = intval($_POST[$keys[$i]]);
            } else if (strncmp( $field_and_type[1][$i] , 'char', $char_len) == 0) {
                //print("2");
                $insert_data[$keys[$i]] = $_POST[$keys[$i]];
            } else if (strncmp( $field_and_type[1][$i] , 'float', $float_len) == 0) {
                //print("3");
                $insert_data[$keys[$i]] = floatval($_POST[$keys[$i]]);
            } else if (strncmp( $field_and_type[1][$i] , 'date', $float_len) == 0) {
                //print("4");
                $insert_data[$keys[$i]] = $_POST[$keys[$i]];
            } else if (strncmp( $field_and_type[1][$i] , 'text', $float_len) == 0) {
                //print("5");
                $insert_data[$keys[$i]] = $_POST[$keys[$i]];
            } else {
                //print("6");
                $insert_data[$keys[$i]] = $_POST[$keys[$i]];

            }
            //var_dump($insert_data);

        }

        //var_dump($insert_data);

        $insert_format = array();
        for ($i = 1; $i < $spac_size ; $i ++) {

            $int_len = strlen('int');
            $char_len = strlen('char');
            $float_len = strlen('float');
            $data_len = strlen('date');
            $text_len = strlen('text');

            if (strncmp( $field_and_type[1][$i] , 'int', $int_len) == 0) {
                $insert_format[$i - 1] = "%d";
            } else if (strncmp( $field_and_type[1][$i] , 'char', $char_len) == 0) {
                $insert_format[$i - 1] = "%s";
            } else if (strncmp( $field_and_type[1][$i] , 'float', $float_len) == 0) {
                $insert_format[$i - 1] = "%f";
            } else if (strncmp( $field_and_type[1][$i] , 'date', $float_len) == 0) {
                $insert_format[$i - 1] = "%s";
            } else if (strncmp( $field_and_type[1][$i] , 'text', $float_len) == 0) {
                $insert_format[$i - 1] = "%s";
            } else {
                $insert_format[$i - 1] = "%s";
            }
            //var_dump($insert_data);

        }
        //var_dump($insert_format);

        global $wpdb;
        $wpdb->insert( 
            'wp_products', 
            $insert_data,
            $insert_format

            /*
            array
                'product_name' => 'redmi',
                'height' => 120.5,
                'water_proof' => 1
            ),
            array(
                '%s',
                '%f',
                '%d'
            )
             */
        );
/*
        var_dump($wpdb->insert_id);
 */
    }
    function InputSpaceGet() {
        $colums_list = GetColumns();
        $result = MakeInputForm($colums_list );
        return $result;
    }

    function InputSpacs (){
        //var_dump($_SERVER["REQUEST_METHOD"]);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $result = InputSpacePost();
        } else {
            $result = InputSpaceGet();
        }
        return  $result;
    }
    add_Shortcode('InputSpacsCode', 'InputSpacs');
?>


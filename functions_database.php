<?php
    function GetDataBaseFormId($id)
    {
        global $wpdb;

        $rows = $wpdb->get_row("SELECT * FROM wp_products WHERE id = $id"); 	
        return $rows;
    }
    function GetColumns()
    {
        global $wpdb;

        $columns = $wpdb->get_results("SHOW COLUMNS FROM  wp_products"); 	
        $columns_num = count($columns);
        //var_dump($columns_num);

        $columns_name = array();
        for($i = 0;$i < $columns_num;$i++) {
            $columns_name[$i] =  $columns[$i]->Field;
        }
  
        return $columns_name;
    }


?>


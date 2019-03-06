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
    function GetFieldAndType()
    {
        global $wpdb;

        $columns = $wpdb->get_results("SHOW COLUMNS FROM  wp_products"); 	
        $columns_num = count($columns);
        //var_dump($columns_num);

        $filed = array();
        for($i = 0;$i < $columns_num;$i++) {
            $field[$i] =  $columns[$i]->Field;
        }

        $type = array();
        for($i = 0;$i < $columns_num;$i++) {
            $type[$i] =  $columns[$i]->Type;
        }

        $field_and_type = array($field, $type);
  
        return $field_and_type;
    }
    function GetImageFromProductName($product_name)
    {
        global $wpdb;
        $file_name = $product_name . "_01";
        $image = $wpdb->get_row("SELECT guid FROM wp_posts WHERE post_mime_type like 'image/%' and post_title like '$file_name'");
        return $image->guid;
    }



?>


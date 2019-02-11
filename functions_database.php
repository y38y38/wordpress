<?php
    function GetDataBaseFormId($id)
    {
		global $wpdb;

   		$rows = $wpdb->get_row("SELECT * FROM wp_products WHERE id = $id"); 	
        return $rows;
    }

?>


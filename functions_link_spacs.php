<?php
    define("LINK_CATEGORY", "Li");
    define("LINK_CATEGORY_NUM", 1);

    function GetLinkCategory()
    {
        $category = array();
        $category[0] = "";
        $category[1] = "officiel link";

        return $category;
    }

    function GetLinkSpacs($rows)
    {
   		$link_spac = array();
		$link_spac[0] = $rows->name;
        $link_spac[1] =  "<a href=\"$rows->link\">link</a>";

        return $link_spac;
    }


    function LinkTable2($product_a, $product_b)
    {
		global $wpdb;
		$id_a = $product_a;
		$id_b = $product_b;
		$id_a_rows = $wpdb->get_row("SELECT * FROM wp_products WHERE id = $id_a"); 	
		$id_b_rows = $wpdb->get_row("SELECT * FROM wp_products WHERE id = $id_b"); 	

		$result = "<span class=\" aa\">Link</span>";

		$category = GetLinkCategory();
        $product1 = GetLinkSpacs($id_a_rows);
        $product2 = GetLinkSpacs($id_b_rows);

		$test_array = array($category, $product1, $product2);
/*		$result =ShowTable3($test_array);*/

		$result =ShowTable4(LINK_CATEGORY, LINK_CATEGORY_NUM, $test_array);
		return $result;
    }

?>


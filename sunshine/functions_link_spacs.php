<?php
    define("LINK_CATEGORY", "Link");
    define("LINK_CATEGORY_NUM", 1);

    function GetLinkCategory()
    {
        $category = array();
        $category[0] = "";
        $category[1] = "officiel link";

        return $category;
    }

    function GetLinkSpacs($id)
    {
        $rows = GetDataBaseFormId($id);
   		$link_spac = array();
		$link_spac[0] = $rows->product_name;
        $link_spac[1] =  "<a href=\"$rows->link\">link</a>";

        return $link_spac;
    }


    function LinkTable2($product_a, $product_b)
    {
		$result = "<span class=\" aa\">Link</span>";

		$category = GetLinkCategory();
        $product1 = GetLinkSpacs($product_a);
        $product2 = GetLinkSpacs($product_b);

		$test_array = array($category, $product1, $product2);

		$result = "<span class=\" LinkIcon\">Link</span>";

		$result .= ShowTable4(LINK_CATEGORY, LINK_CATEGORY_NUM, $test_array);
		return $result;
    }

?>


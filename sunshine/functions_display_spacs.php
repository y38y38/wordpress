<?php
    define("DISPLAY_CATEGORY", "Display");
    define("DISPLAY_CATEGORY_NUM", 5);

    function GetDisplayCategory()
    {
		$category = array();
		$category[0] = "";
		$category[1] = "Resolution";
		$category[2] = "Screen Size";
		$category[3] = "Ppi";
		$category[4] = "Aspect";
		$category[5] = "Type";
        return $category;

    }
    function GetResolution($height, $width) {
        return $height . "x" . $width;
    }
    function GetPpi($inch, $height, $width) {
        if ($inch == 0 ) {
            return "no Info";
        } else {
            $dpi = (($height * $width ) / $inch);
            return $dpi . "ppi";
        }
    }

    function GetDisplaySpacs($id)
    {
        $rows = GetDataBaseFormId($id);
		$spac = array();
		$spac[0] = $rows->product_name;
		$spac[1] = GetResolution($rows->screen_heiight, $rows->screen_width);
		$spac[2] = GetValueAndUnit($rows->screen_size, "inch");
		$spac[3] = GetPpi($rows->screen_heiight, $rows->screen_width,$rows->screen_size);
		$spac[4] = GetCharacter($rows->aspect_ratio);
		$spac[5] = GetCharacter($rows->display_panel_type);
        
        return $spac;
    }


    function DisplaySpaces($product_a, $product_b)
    {
        $category = GetDisplayCategory();

        $product1 = GetDisplaySpacs($product_a);

        $product2 = GetDisplaySpacs($product_b);

		$test_array = array($category, $product1, $product2);
		$result = "<span class=\" DisplayIcon\">Display</span>";
		$result .=ShowTable4(DISPLAY_CATEGORY, DISPLAY_CATEGORY_NUM, $test_array);

		return $result;
    }

?>


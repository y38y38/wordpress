<?php
    define("DESIGN_CATEGORY", "Design");
    define("DESIGN_CATEGORY_NUM", 4);
    function GetDesignCategory()
    {
		$category = array();
		$category[0] = "";
		$category[1] = "Thickness";
		$category[2] = "Width";
		$category[3] = "Height";
		$category[4] = "Weight";
        $category[5] = "Notch";
        return $category;

    }
    function GetLength($length) 
    {
        if ($length == 0) {
            return "No Info";
        } else {
            return $length . "mm";
        }
    }
	function GetWeight($weight) {
        if ($weight== 0) {
            return "No Info";
        } else {
            return $weight . "g";
        }
	}

    function GetDesignSpacs($id)
    {
        $rows = GetDataBaseFormId($id);
		$spac = array();
		$spac[0] = $rows->product_name;
		$spac[1] = GetLength($rows->thickness);
		$spac[2] = GetLength($rows->width);
		$spac[3] = GetLength($rows->height);
		$spac[4] = GetWeight($rows->weight_gram);
        
        return $spac;
    }


    function DesignSpaces($product_a, $product_b)
    {
        $category = GetDesignCategory();

        $product1 = GetDesignSpacs($product_a);

        $product2 = GetDesignSpacs($product_b);

		$test_array = array($category, $product1, $product2);
		$result = "<span class=\" DesignIcon\">Design</span>";
		$result .=ShowTable4(DESIGN_CATEGORY, DESIGN_CATEGORY_NUM, $test_array);

		return $result;
    }

?>


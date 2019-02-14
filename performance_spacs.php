<?php

        define("PERFORMANCE_CATEGORY", "Performance");
        define("PERFORMANCE_CATEGORY_NUM", 5);
    class PerformanceSpaces
    {

        function GetCategory()
        {
            $category = array();
            $category[0] = "";
            $category[1] = "CPU";
            $category[2] = "RAM";
            $category[3] = "Graphics";
            return $category;

        }

        function GetSpacs($id)
        {
            $rows = GetDataBaseFormId($id);
            $spac = array();
            $spac[0] = $rows->name;
            $spac[1] = GetCharacter($rows->chipset);
            $spac[2] = GetValueAndUnit($rows->ram, "GB");
            $spac[3] = GetCharacter($rows->graphics);
        
            return $spac;
        }
    }


    function PerformanceSpaces($product_a, $product_b)
    {

        $space = new PerformanceSpaces();
        $category = $space->GetCategory();

        $product1 = $space->GetSpacs($product_a);

        $product2 = $space->GetSpacs($product_b);

		$test_array = array($category, $product1, $product2);
		$result = "<span class=\" PerformanceIcon\">Performance</span>";
		$result .=ShowTable4(PERFORMANCE_CATEGORY, PERFORMANCE_CATEGORY_NUM, $test_array);

		return $result;
    }

?>


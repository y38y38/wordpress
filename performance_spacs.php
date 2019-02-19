<?php

        define("PERFORMANCE_CATEGORY", "Performance");
        define("PERFORMANCE_CATEGORY_NUM", 4);
    class PerformanceSpaces
    {

        function GetCategory()
        {
            $category = array();
            $category[0] = "";
            $category[1] = "OS";
            $category[2] = "CPU";
            $category[3] = "RAM";
            $category[4] = "Graphics";
            return $category;

        }

        function GetSpacs($id)
        {
            $rows = GetDataBaseFormId($id);
            $spac = array();
            $spac[0] = $rows->name;
            $spac[1] = GetCharacter($rows->os_type);
            $spac[2] = GetCharacter($rows->chipset);
            $spac[3] = GetValueAndUnit($rows->ram, "GB");
            $spac[4] = GetCharacter($rows->graphics);
        
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


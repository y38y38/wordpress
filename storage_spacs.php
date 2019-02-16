<?php

        define("STORAGE_CATEGORY", "Storage");
        define("STORAGE_CATEGORY_NUM", 4);
    class StorageSpaces
    {

        function GetCategory()
        {
            $category = array();
            $category[0] = "";
            $category[1] = "ROM";
            $category[2] = "Expandable Memory Support";
            $category[3] = "Independence Expandable Memory";
            $category[4] = "Expandable Memory Size";
            return $category;

        }

        function GetSpacs($id)
        {
            $rows = GetDataBaseFormId($id);
            $spac = array();
            $spac[0] = $rows->name;
            $spac[1] = GetValueAndUnit($rows->rom, "GB");
            $spac[2] = GetSupport($rows->expandable_memory);
            $spac[3] = GetSupport($rows->independence_expandable_memory);
            $spac[4] = GetValueAndUnit($rows->expandable_memory_size, "GB");
        
            return $spac;
        }
    }


    function StorageSpaces($product_a, $product_b)
    {

        $spac = new StorageSpaces();
        $category = $spac->GetCategory();

        $product1 = $spac->GetSpacs($product_a);

        $product2 = $spac->GetSpacs($product_b);

		$test_array = array($category, $product1, $product2);
		$result = "<span class=\" StorageIcon\">Storage</span>";
		$result .=ShowTable4(STORAGE_CATEGORY, STORAGE_CATEGORY_NUM, $test_array);

		return $result;
    }

?>


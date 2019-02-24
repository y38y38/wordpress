<?php

    class  Spacs
    {
        const SPAC_CATEGORY_NAME = 'Default Name';
        const SPAC_CATEGORY_NUM = 1;

        function GetCategory()
        {
            $category = array();
            $category[0] = "";
            $category[1] = "";
            return $category;

        }

        function GetSpacs($id)
        {
            $rows = GetDataBaseFormId($id);
            $spac = array();
            $spac[0] = $rows->product_name;
            $spac[1] = "";
        
            return $spac;
        }
        function ShowSpacs($product_a, $product_b)
        {
    
            $category = $this->GetCategory();
    
            $product1 = $this->GetSpacs($product_a);
    
            $product2 = $this->GetSpacs($product_b);
    
            $test_array = array($category, $product1, $product2);
            $name = static::SPAC_CATEGORY_NAME;
            $icon_name = static::SPAC_CATEGORY_NAME . "Icon";
            $result = "<span class=\" $icon_name \"> $name </span>";
            $result .=ShowTable4(static::SPAC_CATEGORY_NAME, static::SPAC_CATEGORY_NUM, $test_array);
    
            return $result;
        }
    }
?>

<?php

    class  SignalSpacs extends Spacs
    {
        const SPAC_CATEGORY_NAME = 'Signal';
        const SPAC_CATEGORY_NUM = 6;

        function GetCategory()
        {
            $category = array();
            $category[0] = "";
            $category[1] = "802.11a";
            $category[2] = "802.11b";
            $category[3] = "802.11g";
            $category[4] = "802.11n";
            $category[5] = "802.11ac";
            $category[6] = "Band";
            return $category;

        }

        function GetSpacs($id)
        {
            $rows = GetDataBaseFormId($id);
            $spac = array();
            $spac[0] = $rows->name;
            $spac[1] = GetSupport($rows->wifi_802_11_a);
            $spac[2] = GetSupport($rows->wifi_802_11_b);
            $spac[3] = GetSupport($rows->wifi_802_11_g);
            $spac[4] = GetSupport($rows->wifi_802_11_n);
            $spac[5] = GetSupport($rows->wifi_802_11_ac);
            $spac[6] = GetCharacter($rows->band);
        
            return $spac;
        }
        /*
        function ShowSpacs($product_a, $product_b)
        {
    
            $category = $this->GetCategory();
    
            $product1 = this.GGetSpacs($product_a);
    
            $product2 = this.GGetSpacs($product_b);
    
            $test_array = array($category, $product1, $product2);
            $name = SPAC_CATEGORY_NAME;
            $icon_name = SPAC_CATEGORY_NAME . "Icon";
            $result = "<span class=\" $icon_name \"> $name </span>";
            $result .=ShowTable4(SPAC_CATEGORY_NAME, SPAC_CATEGORY_NUM, $test_array);
    
            return $result;
        }
        */
    }
?>

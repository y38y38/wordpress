<?php
    /* 0 : no info 
       1 : support
       2 : no support
     */
    define("POWER_CATEGORY", "Power");
    define("POWER_CATEGORY_NUM", 3);
    function GetPowerCategory()
    {
		$category = array();
		$category[0] = "";
		$category[1] = "Quick Charge";
		$category[2] = "Wireless Charge";
		$category[3] = "Battery Capacity";
        return $category;

    }
    function GetQuickChargeType($row) 
    {
        //support
        if ($row->quick_charge == 0 ){
            return "No Info";
        } else if ($row->quick_charge == 1) {
            return $row->quick_charge_type;
        } else {
            return "No Support";
        }
    }
	function GetWWeight($weight) {
        if ($weight== 0) {
            return "No Info";
        } else {
            return $weight . "g";
        }
	}

    function GetPowerSpacs($id)
    {
        $rows = GetDataBaseFormId($id);
		$spac = array();
		$spac[0] = $rows->name;
		$spac[1] = GetQuickChargeType($rows);
		$spac[2] = GetSupport($rows->wireless_charging);
		$spac[3] = GetValueAndUnit($rows->battery_capacity, "mAh");
        
        return $spac;
    }


    function PowerSpaces($product_a, $product_b)
    {
        $category = GetPowerCategory();

        $product1 = GetPowerSpacs($product_a);

        $product2 = GetPowerSpacs($product_b);

		$test_array = array($category, $product1, $product2);
		$result = "<span class=\" PowerIcon\">Power</span>";
		$result .=ShowTable4(POWER_CATEGORY, POWER_CATEGORY_NUM, $test_array);

		return $result;
    }

?>


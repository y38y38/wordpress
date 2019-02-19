<?php

        define("DEVICE_CATEGORY", "Device");
        define("DEVICE_CATEGORY_NUM", 4);
    class DeviceSpaces
    {

        function GetCategory()
        {
            $category = array();
            $category[0] = "";
            $category[1] = "Sim Slot Number";
            $category[1] = "Audio jack";
            $category[2] = "NFC";
            $category[3] = "GPS";
            $category[4] = "Fingerprint Sensor";
            //$category[5] = "Fingerprint Sensor Placement";
            $category[5] = "Blutooth";
            $category[6] = "Blutooth Version";
            return $category;

        }

        function GetSpacs($id)
        {
            $rows = GetDataBaseFormId($id);
            $spac = array();
            $spac[0] = $rows->name;
            $spac[1] = GetValueAndUnit($rows->sim_slot_number, "");
            $spac[1] = GetSupport($rows->audio_jack);
            $spac[2] = GetSupport($rows->nfc);
            $spac[3] = GetCharacter($rows->gps_type);
            $spac[4] = GetSupport($rows->fingerprint_sensor);
            $spac[5] = GetSupport($rows->blutooth);
            $spac[6] = GetCharacter($rows->blutooth_version);
        
            return $spac;
        }
    }


    function DeviceSpaces($product_a, $product_b)
    {

        $spac = new DeviceSpaces();
        $category = $spac->GetCategory();

        $product1 = $spac->GetSpacs($product_a);

        $product2 = $spac->GetSpacs($product_b);

		$test_array = array($category, $product1, $product2);
		$result = "<span class=\" DeviceIcon\">Device</span>";
		$result .=ShowTable4(DEVICE_CATEGORY, DEVICE_CATEGORY_NUM, $test_array);

		return $result;
    }

?>


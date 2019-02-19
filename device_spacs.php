<?php

        define("DEVICE_CATEGORY", "Device");
        define("DEVICE_CATEGORY_NUM", 7);
    class DeviceSpaces
    {

        function GetCategory()
        {
            $category = array();
            $category[0] = "";
            $category[1] = "Sim Slot Number";
            $category[2] = "Audio jack";
            $category[3] = "NFC";
            $category[4] = "GPS";
            $category[5] = "Fingerprint Sensor";
            //$category[5] = "Fingerprint Sensor Placement";
            $category[6] = "Blutooth";
            $category[7] = "Blutooth Version";
            return $category;

        }

        function GetSpacs($id)
        {
            $rows = GetDataBaseFormId($id);
            $spac = array();
            $spac[0] = $rows->name;
            $spac[1] = GetValueAndUnit($rows->sim_slot_number, "");
            $spac[2] = GetSupport($rows->audio_jack);
            $spac[3] = GetSupport($rows->nfc);
            $spac[4] = GetCharacter($rows->gps_type);
            $spac[5] = GetSupport($rows->fingerprint_sensor);
            $spac[6] = GetSupport($rows->blutooth);
            $spac[7] = GetCharacter($rows->blutooth_version);
        
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


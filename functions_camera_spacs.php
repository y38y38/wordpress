<?php
    define("CAMERA_CATEGORY", "Ca");
    define("CAMERA_CATEGORY_NUM", 4);
    function GetCameraCategory()
    {
		$category = array();
		$category[0] = "";
		$category[1] = "Pixel";
		$category[2] = "Aperture";
		$category[3] = "Front Camera Pixel";
		$category[4] = "Front Camera Aperture";

        return $category;
    }
	function GetAperture($info) {
		if ( $info == 0 ) {
			return "No Info";
		} else {
			return "f/$info";
		}
	}

	function GetPixel($pixel, $dual_info) {
		if ($dual_info  == NULL) {
			$pixel = $pixel / 1000000;
			return "$pixel MP";
		} else {
			return $dual_info;
		}
		
	}

    function GetCameraSpacs($id)
    {
        $rows = GetDataBaseFormId($id);

   		$camera_spac = array();
		$camera_spac[0] = $rows->name;
        $camera_spac[1] = GetPixel($rows->rear_camera_pixel, $rows->rear_camera_dual_spac);
        $camera_spac[2] = GetAperture($rows->rear_camera_aperture);
        $camera_spac[3] = GetPixel($rows->front_camera_pixel, $rows->front_camera_dual_spac);
        $camera_spac[4] = GetAperture($rows->front_camera_aperture);

        return $camera_spac;
    }

    function CmaeraSpaces4($product_a, $product_b)
    {

        $category = GetCameraCategory();

        $product1 = GetCameraSpacs($product_a);

        $product2 = GetCameraSpacs($product_b);

		$test_array = array($category, $product1, $product2);

        $result = SetAnchor(CAMERA_CATEGORY);
		$result .= "<span class=\" CameraIcon\">Camera</span>";
		$result .= ShowTable4(CAMERA_CATEGORY, CAMERA_CATEGORY_NUM, $test_array);

		return $result;
    }

?>


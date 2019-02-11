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

    function GetCameraSpacs($rows)
    {
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
		global $wpdb;
		$id_a = $product_a;
		$id_b = $product_b;

		$id_a_rows = $wpdb->get_row("SELECT * FROM wp_products WHERE id = $id_a"); 	
		$id_b_rows = $wpdb->get_row("SELECT * FROM wp_products WHERE id = $id_b"); 	

		$result = "<span class=\" CameraIcon\">Camera</span>";

        $category = GetCameraCategory();

        $product1 = GetCameraSpacs($id_a_rows);

        $product2 = GetCameraSpacs($id_b_rows);

		$test_array = array($category, $product1, $product2);

		$result .=ShowTable4(CAMERA_CATEGORY, CAMERA_CATEGORY_NUM, $test_array);

		return $result;
    }

?>


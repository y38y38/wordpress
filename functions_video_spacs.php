<?php
    define("VIDEO_CATEGORY", "Vi");
    define("VIDEO_CATEGORY_NUM", 7);

    function GetVideoSpacs($rows)
    {
		$video_spac = array();
		$video_spac[0] = $rows->name;
		$video_spac[1] = GetVideo($rows->video_1080_60p);
		$video_spac[2] = GetVideo($rows->video_1080_30p);
		$video_spac[3] = GetVideo($rows->video_720_30p);
		$video_spac[4] = GetVideo($rows->video_480_30p);
		$video_spac[5] = GetVideoSlowMotionMax($rows->slow_motion_1080p_max);
		$video_spac[6] = GetVideoSlowMotionMax($rows->slow_motion_720p_max);
		$video_spac[7] = GetVideoSlowMotionMax($rows->slow_motion_480p_max);
        
        return $video_spac;
    }


    function VideoSpaces3($product_a, $product_b)
    {
		$id_a = $product_a;
		$id_b = $product_b;
		global $wpdb;
		$id_a_rows = $wpdb->get_row("SELECT * FROM wp_products WHERE id = $id_a"); 	
		$id_b_rows = $wpdb->get_row("SELECT * FROM wp_products WHERE id = $id_b"); 	
		$result = "<span class=\" VideoIcon\">Video Recording</span>";

		$category = array();
		$category[0] = "";
		$category[1] = "1080 60p";
		$category[2] = "1080 30p";
		$category[3] = "720 30p";
		$category[4] = "480 30p";
		$category[5] = "1080p Slow Motion Max FPS";
		$category[6] = "720p Slow Motion Max FPS";
		$category[7] = "480p Slow Motion Max FPS";


        $product1 = GetVideoSpacs($id_a_rows);

        $product2 = GetVideoSpacs($id_b_rows);

		$test_array = array($category, $product1, $product2);
/*		$result .=ShowTable3($test_array);*/
		$result .=ShowTable4(VIDEO_CATEGORY, VIDEO_CATEGORY_NUM, $test_array);

		return $result;
    }

?>


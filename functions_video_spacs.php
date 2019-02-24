<?php
    define("VIDEO_CATEGORY", "Video");
    define("VIDEO_CATEGORY_NUM", 7);
    function GetVideoCategory()
    {
		$category = array();
		$category[0] = "";
		$category[1] = "1080 60p";
		$category[2] = "1080 30p";
		$category[3] = "720 30p";
		$category[4] = "480 30p";
		$category[5] = "1080p Slow Motion Max FPS";
		$category[6] = "720p Slow Motion Max FPS";
		$category[7] = "480p Slow Motion Max FPS";
        return $category;

    }
	function GetVideo($video) {
		if ($video == 1) {
/*			return "v";*/
			return "<span class=\" CheckIcon\"></span>";
			return "";
		} else {
			return "-";
		}
	}
	function GetVideoSlowMotionMax($video) {
		if ($video == 0) {
			return "-";
		} else {
			return $video;
		}
	}

    function GetVideoSpacs($id)
    {
        $rows = GetDataBaseFormId($id);
		$video_spac = array();
		$video_spac[0] = $rows->product_name;
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
        $category = GetVideoCategory();

        $product1 = GetVideoSpacs($product_a);

        $product2 = GetVideoSpacs($product_b);

		$test_array = array($category, $product1, $product2);
		$result = "<span class=\" VideoIcon\">Video Recording</span>";
		$result .=ShowTable4(VIDEO_CATEGORY, VIDEO_CATEGORY_NUM, $test_array);

		return $result;
    }

?>


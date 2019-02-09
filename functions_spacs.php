<?php
function TestSpaces($atts) {
	global $wpdb;
	
	$myrows = $wpdb->get_results( "SELECT id, name FROM products" );
		global $wpdb;
		foreach ($wpdb->products as $key => $value) {
  			echo '<p>[' . $key . ']' . $value . '</p>';
		}

		$result =  "Camera";
		return $result;
	}
	add_shortcode('TestSpaces', 'TestSpaces');



	function jisaku_shortcode() {
	  // 製品名（検索キーワード）
	  $product_name = isset($_GET['keyword']) ? $_GET['keyword'] : "";

  	// 検索結果メッセージ
  	$message = ( isset($_GET['keyword']) && (!$product_name) ) ? "製品名を入力してください。" : "";


  	// wpdbオブジェクト
  	global $wpdb;

  	// ★デバッグ用
  	$wpdb->show_errors();

  	// キーワードが設定されているとき
  	if ($product_name) {

    	// SQL
    	$sql = $wpdb->prepare("SELECT p.name, p.price FROM $wpdb->products p WHERE p.name LIKE %s", '%'.$product_name.'%' );
    # -> "SELECT p.name, p.price FROM wp_products p WHERE p.name LIKE '%製品名（検索キーワード）%'"

    	// クエリ実行
    	$rows = $wpdb->get_results($sql);

    	// 検索結果メッセージ
    	$message = (!$rows) ? "該当する製品が見つかりませんでした。" : count($rows)."件の製品が見つかりました。";
  	}

  	// 製品価格を表示
  	if($rows){
    	foreach ($rows as $row) {
      		echo "<p>【".$row->name."】価格：".$row->price."円</p>";
    	}
  	}

	
	}
	add_shortcode('jisaku', 'jisaku_shortcode');

	//ショートコードを使ったphpファイルの呼び出し方法
	function my_php_Include($params = array()) {
 		extract(shortcode_atts(array('file' => 'default'), $params));
 		ob_start();
 		include(STYLESHEETPATH . "/$file.php");
 		return ob_get_clean();
	}
	add_shortcode('myphp', 'my_php_Include');

	function hogeFunc() {
    	return "ショートコード作ってみたよ。";
	}
	add_shortcode('hoge', 'hogeFunc');

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
	function ShowTable2($table)
	{

		$colum_num = count($table);

		$cate_table = $table[0];
        $row_num = count($cate_table);
        $result = "<form method=\"post\">";
        $result .= "<div class=\"CheckBoxes\">";
		$result .=  "<table>";
		$result .= "<tbody>";
		for ( $index = 0; $index < $row_num ;$index++) {
			if  ( $index == 0) {
				$result .= "		<tr>";
				for ($colum_index = 0; $colum_index < 3;$colum_index++ ) {
					$colum = $table[$colum_index];
					$result .= "<th>$colum[$index]</th>";
				}
				$result .= "</tr>";
			} else {
				$result .= "<tr>";
				for ($colum_index = 0; $colum_index < $colum_num;$colum_index++ ) {
					if ($colum_index == 0) {
						$colum = $table[$colum_index];
						$result .= "<td class=category><input type=\"checkbox\" id=\"$colum[$index]$index\"><label for=\"$colum[$index]$index\">$colum[$index]</label></td>";
					} else {
						$colum = $table[$colum_index];
						$result .= "<td>$colum[$index]</td>";
					}
				}
				$result .= "</tr>";
			}
		}
		$result .= "</tbody>";
		$result .= "</table>";
        $result .= "</div>";
        $result .= "</form>";

		return $result;
	}

    /* table */

	function ShowTable3($table)
	{

		$colum_num = count($table);/*width*/

		$cate_table = $table[0];
        $row_num = count($cate_table);/*height*/
        $result = "<form method=\"post\">";
        $result .= "<div class=\"CheckBoxes\">";
		for ( $index = 1; $index < $row_num ;$index++) {
			$colum = $table[0];/*category name table*/
			$result .= "<input type=\"checkbox\" id=\"$colum[$index]$index\"><label for=\"$colum[$index]$index\">$colum[$index]</label>";
    		$result .=  "<table>";
	    	$result .= "<tbody>";

            /* write category name */
			for ($colum_index = 1; $colum_index < $colum_num;$colum_index++ ) {
                /* write gadget name  */
	    		$result .= "<tr>";
				$colum = $table[$colum_index];
				$result .= "<td>$colum[0]</td>";
                /* write categoty value  */
				$colum = $table[$colum_index];
				$result .= "<td>$colum[$index]</td>";
		    	$result .= "</tr>";

            }

		    $result .= "</tbody>";
		    $result .= "</table>";
            $result .= "<br/>";
		}
        $result .= "</div>";
        $result .= "</form>";

		return $result;
	}


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

	function VideoSpaces2($atts) {
		extract(shortcode_atts(array(
				'product_a' => '1',
				'product_b' => '1'), $atts));
				global $wpdb;
		$id_a = $product_a;
		$id_b = $product_b;
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
		$result .=ShowTable3($test_array);
		return $result;
	}
	add_shortcode('VideoSpace2Code', 'VideoSpaces2');

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

	function CameraSpaces2($atts) {
		extract(shortcode_atts(array(
				'product_a' => '1',
				'product_b' => '1'), $atts));


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
		$result .=ShowTable3($test_array);

		return $result;
	}
	add_shortcode('CameraSpaces2', 'CameraSpaces2');

    function GetLinkCategory()
    {
        $category = array();
        $category[0] = "";
        $category[1] = "officiel link";

        return $category;
    }

    function GetLinkSpacs($rows)
    {
   		$link_spac = array();
		$link_spac[0] = $rows->name;
        $link_spac[1] =  "<a href=\"$rows->link\">link</a>";

        return $link_spac;
    }

	function LinkTable($atts) {
		extract(shortcode_atts(array(
				'product_a' => '1',
				'product_b' => '1'), $atts));
		global $wpdb;
		$id_a = $product_a;
		$id_b = $product_b;
		$id_a_rows = $wpdb->get_row("SELECT * FROM wp_products WHERE id = $id_a"); 	
		$id_b_rows = $wpdb->get_row("SELECT * FROM wp_products WHERE id = $id_b"); 	


		$category = GetLinkCategory();
        $product1 = GetLinkSpacs($id_a_rows);
        $product2 = GetLinkSpacs($id_b_rows);

		$test_array = array($category, $product1, $product2);
		$result =ShowTable3($test_array);

		return $result;

	}
	add_shortcode('LinkCode', 'LinkTable');


		
	function hogeFunc3() {
		global $wpdb;
		// テーブル内の全データをSELECT
		$rows = $wpdb->get_results("SELECT * FROM wp_product");

		$size = count($rows,1);
		echo $size;
		
		// 取得したデータ1行ごとに処理。
		// データはカラム名の連想配列になっているので、
		// $変数->nameのようにカラム名をそのまま指定すれば中身のデータを取得できる。
		$result = "<table><tbody>";
		echo "test";
		echo "test";
/*
		echo $rows;
		print_r($rows);
		echo $result;
		foreach($rows as $row){
    		$result .= "<tr><td>" . $row->name ."</td><td>" . $row->num ."</td></tr>";
		}
		$result .= "</tbody></table>";
 
		print $result;		
*/
	}
	add_shortcode('hoge3', 'hogeFunc3');

	
?>


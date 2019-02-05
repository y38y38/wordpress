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
		$result =  "<table>";
		$result .= "	<tbody>";
		for ( $index = 0; $index < $row_num ;$index++) {
			if  ( $index == 0) {
				$result .= "		<tr>";
				for ($colum_index = 0; $colum_index < 3;$colum_index++ ) {
					$colum = $table[$colum_index];
					$result .= "<th>$colum[$index]</th>";
				}
				$result .= "		</tr>";
			} else {
				$result .= "		<tr>";
				for ($colum_index = 0; $colum_index < $colum_num;$colum_index++ ) {
					if ($colum_index == 0) {
						$colum = $table[$colum_index];
						$result .= "			<td class=category>$colum[$index]</td>";
					} else {
						$colum = $table[$colum_index];
						$result .= "<td>$colum[$index]</td>";
					}
				}
				$result .= "		</tr>";
			}
		}
		$result .= "	</tbody>";
		$result .= "</table>";
		return $result;
	}

	function ShowTable($category, $product1, $product2)
	{
		$result =  "<table>";
		$result .= "	<tbody>";
		$num = count($category);
		for ( $index = 0; $index < $num ;$index++) {
			if  ( $index == 0) {
				$result .= "		<tr>";
				$result .= "			<th></th>";
				$result .= "			<th> $product1[$index]</th>";
				$result .= "			<th> $product2[$index]</th>";
				$result .= "		</tr>";
			} else {
				$result .= "		<tr>";
				$result .= "			<td class=category>$category[$index]</td>";
				$result .= "			<td> $product1[$index] </td>";
				$result .= "			<td> $product2[$index] </td>";
				$result .= "		</tr>";
			}
		}
		$result .= "	</tbody>";
		$result .= "</table>";
		return $result;
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
		
		$product1 = array();
		$product1[0] = $id_a_rows->name;
		$product1[1] = GetVideo($id_a_rows->video_1080_60p);
		$product1[2] = GetVideo($id_a_rows->video_1080_30p);
		$product1[3] = GetVideo($id_a_rows->video_720_30p);
		$product1[4] = GetVideo($id_a_rows->video_480_30p);
		$product1[5] = GetVideoSlowMotionMax($id_a_rows->slow_motion_1080p_max);
		$product1[6] = GetVideoSlowMotionMax($id_a_rows->slow_motion_720p_max);
		$product1[7] = GetVideoSlowMotionMax($id_a_rows->slow_motion_480p_max);

		$product2 = array();
		$product2[0] = $id_b_rows->name;
		$product2[1] = GetVideo($id_b_rows->video_1080_60p);
		$product2[2] = GetVideo($id_b_rows->video_1080_30p);
		$product2[3] = GetVideo($id_b_rows->video_720_30p);
		$product2[4] = GetVideo($id_b_rows->video_480_30p);
		$product2[5] = GetVideoSlowMotionMax($id_b_rows->slow_motion_1080p_max);
		$product2[6] = GetVideoSlowMotionMax($id_b_rows->slow_motion_720p_max);
		$product2[7] = GetVideoSlowMotionMax($id_b_rows->slow_motion_480p_max);
		
		$test_array = array($category, $product1, $product2);
		$result .=ShowTable2($test_array);
		return $result;
	}
	add_shortcode('VideoSpace2Code', 'VideoSpaces2');

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


		$category = array();
		$category[0] = "";
		$category[1] = "Pixel";
		$category[2] = "Aperture";
		$category[3] = "Front Camera Pixel";
		$category[4] = "Front Camera Aperture";


		$product1 = array();
		$product1[0] = $id_a_rows->name;
        $product1[1] = GetPixel($id_a_rows->rear_camera_pixel, $id_a_rows->rear_camera_dual_spac);
        $product1[2] = GetAperture($id_a_rows->rear_camera_aperture);
        $product1[3] = GetPixel($id_a_rows->front_camera_pixel, $id_a_rows->front_camera_dual_spac);
        $product1[4] = GetAperture($id_a_rows->front_camera_aperture);


		$product2 = array();
		$product2[0] = $id_b_rows->name;
        $product2[1] = GetPixel($id_b_rows->rear_camera_pixel, $id_b_rows->rear_camera_dual_spac);
        $product2[2] = GetAperture($id_b_rows->rear_camera_aperture);
        $product2[3] = GetPixel($id_b_rows->front_camera_pixel, $id_b_rows->front_camera_dual_spac);
        $product2[4] = GetAperture($id_b_rows->front_camera_aperture);

		$test_array = array($category, $product1, $product2);
		$result .=ShowTable2($test_array);

		return $result;
	}
	add_shortcode('CameraSpaces2', 'CameraSpaces2');



	function LinkTable($atts) {
		extract(shortcode_atts(array(
				'product_a' => '1',
				'product_b' => '1'), $atts));
		global $wpdb;
		$id_a = $product_a;
		$id_b = $product_b;
		$id_a_rows = $wpdb->get_row("SELECT * FROM wp_products WHERE id = $id_a"); 	
		$id_b_rows = $wpdb->get_row("SELECT * FROM wp_products WHERE id = $id_b"); 	
		
		$result =  "Link";
		$result .=  "<table>";
		$result .= "	<tbody>";
		$result .= "		<tr>";
		//name 
		$result .= "			<th></th>";
		$result .= "			<th> $id_a_rows->name</th>";
		$result .= "			<th> $id_b_rows->name</th>";
		$result .= "		</tr>";

		//link
		$result .= "		<tr>";
		$result .= "			<td class=category>officiel link</td>";
		$result .= "			<td> <a href= $id_a_rows->link >link</a> </td>";
		$result .= "			<td> <a href= $id_b_rows->link >link</a> </td>";
		$result .= "		</tr>";
		
		
		$result .= "	</tbody>";
		$result .= "</table>";
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


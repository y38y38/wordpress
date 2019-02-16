<?php
    define("FILTER_INFO", "Filter");
    define("VIEW_INFO", "View");
    define("FILTER_CLEAR", "FilterClear");
    define("ANCHOR", "Anchor");


    function Num2AllFilter($category_num)
    {
        $filter = 0;
        for ($i = 0;$i < $category_num;$i++)
        {
            $filter |= 1<<$i;
        }
        return $filter;
    }
    function  Array2Bin($filter_array)
    {
        $filter_binary = 0;
        $filter_size = count($filter_array);

        for ( $i = 0; $i < $filter_size ; $i++) {
            if ($filter_array[$i] == '0') {

            } else {
                $filter_binary |= 1<<$i;
            }
        }
        return $filter_binary;
    }

    function IsView($view_info, $index)
    {
        $tmp = $view_info >> $index;
        $tmp = $tmp & 0x1;
        return $tmp;
    }
    function GetFilterInfo($category_name)
    {
        $camera_filter_info = 0;

        $filter_clear_string = $category_name . FILTER_CLEAR;
        if(isset($_GET[$filter_clear_string])){
            return 0;
         }
        $filter_name = $category_name . FILTER_INFO ;
        if(isset($_GET[$filter_name])){
            $camera_filter_info_string = $_GET[$filter_name];
            //var_dump($camera_filter_info_string);
            $camera_filter_info = Array2Bin($camera_filter_info_string);
        }
        //var_dump($camera_filter_info);
        return $camera_filter_info;
    }


    function GetViewInfo($category_name ,$category_num)
    {

        $view_info = Num2AllFilter( $category_num + 1);

        $filter_clear_string = $category_name . FILTER_CLEAR;

        if(isset($_GET[$filter_clear_string])){
            return $view_info;
         }
        $view_name = $category_name . VIEW_INFO ;
        if(isset($_GET[$view_name])){
            $view_info_string = $_GET[$view_name];
            //var_dump($view_info_string);
            $view_info = intval($view_info_string);
        }
        //var_dump($view_info);
        return $view_info;
    }

    function UpdateViewInfo($view_info, $filter_info)
    {
        $view_info &= ~$filter_info;
        return $view_info;
    }
    
    function IsUpdateFilter($category_name) {
        $filter_clear_string = $category_name . FILTER_CLEAR;
        if(isset($_GET[$filter_clear_string])){
            return TRUE;
        }
        

    }

	function ShowTable4($category_name, $category_num, $table)
	{

        $filter = GetFilterInfo($category_name);
        //var_dump($filter);

        $view_info = GetViewInfo($category_name, $category_num);
        //var_dump($view_info);

        $view_info = UpdateViewInfo($view_info, $filter);
        //var_dump($view_info);



		$colum_num = count($table);/*width*/

		$cate_table = $table[0];
        $row_num = count($cate_table);/*height*/
//        $result = "<form method=\"get\">";


        $view_info_name = $category_name . VIEW_INFO;
        $result = "<input type = \"hidden\" name = \"$view_info_name\" value = $view_info>";

        for ( $index = 0; $index < $row_num;$index++) {
            $filter_name1 = $category_name . FILTER_INFO . "[". strval($index) . "]";
            //var_dump($filter_name1);
            $result .= "<input type = \"hidden\" name = \"$filter_name1\" value = \"0\">";
        }

        $result .= "<div class=\"CheckBoxes\">";
		for ( $index = 1; $index < $row_num ;$index++) {
            if (IsView($view_info, $index) != 0) {
    			$colum = $table[0];/*category name table*/
                $filter_name1 = $category_name . FILTER_INFO . "[". strval($index) . "]";
	    		$result .= "<input type=\"checkbox\" id=\"$colum[$index]$index\" name = \"$filter_name1\" value = \"1\"><label for=\"$colum[$index]$index\">$colum[$index]</label>";
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

		}
        $view_info_name = $category_name . VIEW_INFO;
        $all_view_info = Num2AllFilter($row_num);
        //var_dump($all_view_info);
        $result .= "<button type =\"submit\" >filter check category</button><br>";
        $filter_clear_string = $category_name . FILTER_CLEAR;
        $result .= "<button type =\"submit\"  name = \"$filter_clear_string\"> view all category</button>";
        $result .= "</div>";

		return $result;
	}

	function SetAnchor($category_name)
    {
        $anchor_name = $category_name . ANCHOR;

        $result = "<a name= $anchor_name></a>";

        return $result;
    }

    function CompareSmartPhone($atts) {
		extract(shortcode_atts(array(
				'product_a' => '1',
				'product_b' => '1'), $atts));
        $result = "<form method=\"get\">";
        $result .= DesignSpaces($product_a, $product_b);
        $result .= PerformanceSpaces($product_a, $product_b);
        $result .= StorageSpaces($product_a, $product_b);
        $result .= DisplaySpaces($product_a, $product_b);
        $result .= CmaeraSpaces4($product_a, $product_b);
        $result .= VideoSpaces3($product_a, $product_b);
        $result .= PowerSpaces($product_a, $product_b);
        $result .= DeviceSpaces($product_a, $product_b);
        $result .= LinkTable2($product_a, $product_b);
        $result .= "</form>";
        return $result;
    }
    add_Shortcode('CompareSmartPhoneCode', 'CompareSmartPhone');
		

	
?>


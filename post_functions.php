<?php
    function MyTestPage($atts)
    {
		extract(shortcode_atts(array(
				'id' => '0'
				), $atts));
        //$result = GetProductNameFromId($id);
        //var_dump($result);
        //PostFromId($id);
    }
    add_Shortcode('MyTestPageCode', 'MyTestPage');

    function GetProductNameFromId($id)
    {
        global $wpdb;
        $query = "SELECT product_name FROM wp_products WHERE id = $id";
        $product_name = $wpdb->get_var($query, 0,0);
        //var_dump($product_name);
        return $product_name;

    }
    function PostFromId($id) {

        var_dump( $id);
        for ($i = 1; $i < $id ;$i++) {
            $product2 = GetProductNameFromId($i);
            if (isset($product2 )) {
                $insert_data = array();
                $insert_format = array();
                $insert_data['post_author'] = 1;
                $insert_format[0] =  "%d";

                $insert_data['post_date'] = current_time("mysql");
                $insert_format[1] =  "%s";

                $insert_data['post_date_gmt'] = current_time("mysql", 1);
                $insert_format[2] =  "%s";

                $my_content = "[CompareSmartPhoneCode product_a=\"$id\" product_b=\"$i\"]";
                $insert_data['post_content'] = $my_content;
                $insert_format[3] =  "%s";

                $product1 = GetProductNameFromId($id);
                $my_title = $product1  . " vs " . $product2;
                $insert_data['post_title'] = $my_title;
                $insert_format[4] =  "%s";

                //$insert_data['post_excerpt'] = ;
                $insert_data['post_status'] = 'publish';
                $insert_format[5] =  "%s";

                $insert_data['comment_status'] = 'open';
                $insert_format[6] =  "%s";

                $insert_data['ping_status'] = 'open';
                $insert_format[7] =  "%s";

                //$insert_data['post_password'] = ;
                $my_title = str_replace(" ", "-", $my_title);
                $insert_data['post_name'] = $my_title;
                $insert_format[8] =  "%s";

                //$insert_data['to_ping'] = ;
                $insert_data['post_modified'] = current_time("mysql");
                $insert_format[9] =  "%s";

                $insert_data['post_modified_gmt'] = current_time("mysql", 1);
                $insert_format[10] =  "%s";

                //$insert_data['post_content_filtered'] = ;
                //$insert_data['post_parent'] = ;
                $my_guid = $my_title . current_time("mysql");
                $insert_data['guid'] = $my_guid;
                $insert_format[11] =  "%s";

                //$insert_data['menu_order'] = ;
                $insert_data['post_type'] = 'post';
                $insert_format[12] =  "%s";

                //$insert_data['post_mime_type'] = ;
                //$insert_data['comment_count'] = ;
                global $wpdb;
                $wpdb->insert( 
                    'wp_posts', 
                    $insert_data,
                    $insert_format

                );
                //var_dump($i);
                //var_dump($insert_data);
                //var_dump($insert_format);
            }  
            
        }

        //var_dump($wpdb->insert_id);
    }
?>


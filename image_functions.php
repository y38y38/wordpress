<?php

    class  ImageSpacs extends Spacs
    {
        const SPAC_CATEGORY_NAME = 'Image';
        const SPAC_CATEGORY_NUM = 1;

        function GetCategory()
        {
            $category = array();
            $category[0] = "";
            $category[1] = "Photo";
            return $category;

        }

        function GetSpacs($id)
        {
            $rows = GetDataBaseFormId($id);
            $spac = array();
            $spac[0] = $rows->product_name;
            $image_url = GetImageFromProductName($rows->product_name);
            //var_dump($image_url);
            $spac[1] = "<img src='$image_url' alt= '$rows->product_name' title='$rows->product_name'>";
        
            return $spac;
        }
    }
?>

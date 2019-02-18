<?php

    class  BandSpacs extends Spacs
    {
        const SPAC_CATEGORY_NAME = 'band';
        const SPAC_CATEGORY_NUM = 1;

        function GetCategory()
        {
            $category = array();
            $category[0] = "";
            $category[1] = "Band";
            return $category;

        }

        function GetSpacs($id)
        {
            $rows = GetDataBaseFormId($id);
            $spac = array();
            $spac[0] = $rows->name;
            $spac[1] = GetCharacter($rows->band);
        
            return $spac;
        }
    }
?>

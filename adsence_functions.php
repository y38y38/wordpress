<?php
    function AddAdsence()
    {
        $result =  "<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"> ";
        $result .= "</script><!-- update-gadget --> ";
        $result .= "<ins class=\"adsbygoogle\" ";
        $result .= "style=\"display:block\" ";
        $result .= "data-ad-client=\"ca-pub-8345694629486322\" ";
        $result .= "data-ad-slot=\"7640213261\" ";
        $result .= "data-ad-format=\"auto\" ";
        $result .= "data-full-width-responsive=\"true\"></ins> ";
        $result .= "<script> ";
        $result .= "(adsbygoogle = window.adsbygoogle || []).push({}) ";
        $result .= "</script> ";
        return $result;
    }
?>


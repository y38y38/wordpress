<?php
    function set_spacs_page_title($title){
        if(is_single()){
              if (has_tag('book')) {
                  $title['title'] = '【書籍紹介】' . $title['title'] ;
              } elseif (has_tag('wordpress')) {
                  $title['title'] ='【WordPress】' .$title['title'] ;
              }
       }
       return $title;
    };
    add_filter('document_title_parts', 'set_spacs_page_title');
?>


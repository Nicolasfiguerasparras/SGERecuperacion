<?php
    get_header();

    $criterio = '';
    if(is_category()){
        $criterio = 'Category';
    }elseif(is_author()){
        $criterio = 'Author';
    }elseif(is_tag()){
        $criterio = 'Tag';
    }elseif(is_date()){
        $criterio = 'Date';
    }elseif(is_day()){
        $criterio = 'Daily';
    }elseif(is_month()){
        $criterio = 'Monthly';
    }elseif(is_year()){
        $criterio = 'Yearly';
    }

    echo "Archives for: ".$criterio;
?>
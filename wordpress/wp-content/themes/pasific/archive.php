<?php
    get_header();

    $criterio = '';
    $loquebusco = '';

    if(is_category()){
        $criterio = 'Category';
        $loquebusco = single_cat_title('', false);
    }elseif(is_tag()){
        $criterio = 'Tag';
        $loquebusco = single_cat_title('', false);
    }elseif(is_author()){
        $criterio = 'Tag';
        $loquebusco = get_the_author();
    }elseif(is_day()){
        $criterio = 'Daily';
        $loquebusco = get_the_date();
    }elseif(is_month()){
        $criterio = 'Monthly';
        $loquebusco = get_the_date('M Y');
    }elseif(is_year()){
        $criterio = 'Yearly';
        $loquebusco = get_the_date('Y');
    }

    echo "Archives for: ".$criterio;

    $num_posts_founded = $wp_the_query->found_posts;
    global $numposts;
    $numposts = 0;

?>
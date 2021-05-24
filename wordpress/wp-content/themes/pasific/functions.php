<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // AÑADIR SOPORTES AL TEMA
    add_theme_support('post-thumbnails'); // Añade la posibilidad de elegir foto representativa

    function my_theme_scripts() {
        wp_register_script('JQuery', get_template_directory_uri().'/assets/js/core/jquery.min.js', null, null, false);
        wp_enqueue_script('JQuery');

        wp_register_script('bootstrap', get_template_directory_uri().'/assets/js/core/bootstrap-3.3.7.min.js', null, null, false);
        wp_enqueue_script('bootstrap');

        wp_register_script('jquery.magnific-popup', get_template_directory_uri().'/assets/js/magnific-popup/jquery.magnific-popup.min.js', null, null, false);
        wp_enqueue_script('jquery.magnific-popup');

        wp_register_script('magnific-popup-zoom-gallery', get_template_directory_uri().'/assets/js/magnific-popup/magnific-popup-zoom-gallery.js', null, null, false);
        wp_enqueue_script('magnific-popup-zoom-gallery');

        wp_register_script('circle-progress', get_template_directory_uri().'/assets/js/progress-bar/circle-progress.js', null, null, false);
        wp_enqueue_script('circle-progress');

        wp_register_script('circle-progress-main', get_template_directory_uri().'/assets/js/progress-bar/circle-progress-main.js', null, null, false);
        wp_enqueue_script('circle-progress-main');

        wp_register_script('jquery.appears', get_template_directory_uri().'/assets/js/main/jquery.appear.js', null, null, false);
        wp_enqueue_script('jquery.appears');

        wp_register_script('isotope', get_template_directory_uri().'/assets/js/main/isotope.pkgd.min.js', null, null, false);
        wp_enqueue_script('isotope');

        wp_register_script('parallax', get_template_directory_uri().'/assets/js/main/parallax.min.js', null, null, false);
        wp_enqueue_script('parallax');

        wp_register_script('countTo', get_template_directory_uri().'/assets/js/main/jquery.countTo.js', null, null, false);
        wp_enqueue_script('countTo');

        wp_register_script('owl.carousel', get_template_directory_uri().'/assets/js/main/owl.carousel.min.js', null, null, false);
        wp_enqueue_script('owl.carousel');

        wp_register_script('jquery.sticky', get_template_directory_uri().'/assets/js/main/jquery.sticky.js', null, null, false);
        wp_enqueue_script('jquery.sticky');

        wp_register_script('imagesloaded', get_template_directory_uri().'/assets/js/main/imagesloaded.pkgd.min.js', null, null, false);
        wp_enqueue_script('imagesloaded');

        wp_register_script('main', get_template_directory_uri().'/assets/js/main/main.js', null, null, false);
        wp_enqueue_script('main');

        wp_enqueue_style('style', get_stylesheet_uri()); // get_stylesheet_uri es solo para la hoja de estilos principal
        
        wp_enqueue_style('dashicons');

        wp_register_style('bootstrap', get_template_directory_uri().'/assets/css/core/bootstrap-3.3.7.min.css', null, null, false);
        wp_enqueue_style('bootstrap');

        wp_register_style('animate', get_template_directory_uri().'/assets/css/core/animate.min.css', null, null, false);
        wp_enqueue_style('animate');

        wp_register_style('main', get_template_directory_uri().'/assets/css/main/main.css', null, null, false);
        wp_enqueue_style('main');

        wp_register_style('setting', get_template_directory_uri().'/assets/css/main/setting.css', null, null, false);
        wp_enqueue_style('setting');

        wp_register_style('hover', get_template_directory_uri().'/assets/css/main/hover.css', null, null, false);
        wp_enqueue_style('hover');

        wp_register_style('magic.min', get_template_directory_uri().'/assets/css/magnific/magic.min.css', null, null, false);
        wp_enqueue_style('magic.min');

        wp_register_style('magnific-popup', get_template_directory_uri().'/assets/css/magnific/magnific-popup.css', null, null, false);
        wp_enqueue_style('magnific-popup');

        wp_register_style('magnific-popup-zoom-gallery', get_template_directory_uri().'/assets/css/magnific/magnific-popup-zoom-gallery.css', null, null, false);
        wp_enqueue_style('magnific-popup-zoom-gallery');

        wp_register_style('owl.carousel', get_template_directory_uri().'/assets/css/owl-carousel/owl.carousel.css', null, null, false);
        wp_enqueue_style('owl.carousel');

        wp_register_style('owl.theme', get_template_directory_uri().'/assets/css/owl-carousel/owl.theme.css', null, null, false);
        wp_enqueue_style('owl.theme');

        wp_register_style('owl.transitions', get_template_directory_uri().'/assets/css/owl-carousel/owl.transitions.css', null, null, false);
        wp_enqueue_style('owl.transitions');

        wp_register_style('pasific', get_template_directory_uri().'/assets/css/color/pasific.css', null, null, false);
        wp_enqueue_style('pasific');

        wp_register_style('font-awesome', get_template_directory_uri().'/assets/css/icon/font-awesome.css', null, null, false);
        wp_enqueue_style('font-awesome');

        wp_register_style('et-line', get_template_directory_uri().'/assets/css/icon/et-line-font.css', null, null, false);
        wp_enqueue_style('et-line');

        wp_register_style('favicon', get_template_directory_uri().'/assets/img/favicon.png', null, null, false);
        wp_enqueue_style('favicon');

        wp_register_style('apple-touch-icon', get_template_directory_uri().'/assets/img/apple-touch-icon.png', null, null, false);
        wp_enqueue_style('apple-touch-icon');

        wp_register_style('apple-touch-icon-72x72', get_template_directory_uri().'/assets/img/apple-touch-icon-72x72.png', null, null, false);
        wp_enqueue_style('apple-touch-icon-72x72');

        wp_register_style('apple-touch-icon-114x114', get_template_directory_uri().'/assets/img/apple-touch-icon-114x114.png', null, null, false);
        wp_enqueue_style('apple-touch-icon-114x114');

    }

    add_action('wp_enqueue_scripts', 'my_theme_scripts');

    /*
     *
     * Obterner un listado con los tags del autor
     */

    function list_tags($limit) {
        $args = array(
            'orderby' => 'count',
            'order' => 'DESC',
            'number' => $limit,
        );

        $tags = get_tags($args);

        foreach($tags as $tag) {
            echo "<a href='".get_tag_link($tag->term_id)."' rel='tag'>".$tag->name."<span>[". $tag->count ."]</span>";
        }
    }

    function post_categories($post_id) {
        $cats = get_the_category($post_id);
        $string = '';
        foreach($cats as $cat) {
            $string .= "<a href='".get_category_link($cat->term_id)."'>".$cat->name."</a>";
        }

        return substr($string, 0, -2);
    }

    /*
     * Registrar widgets
     * 
     */
    function my_sidebar_widget() {
        register_sidebar(array(
            'name' => 'Sidebar Tag Cloud',
            'id' => 'sidebar_tg',
            'description' => 'Sidebar Tag Cloud Widget',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        ));
    }
    add_action('widgets_init', 'my_sidebar_widget');

    
    /**
     * Add social media & image fields to user profile
     */
    function add_social_media($user_methods) {
        // Añadir los campos de texto como queramos
        $user_methods['facebook'] = 'Facebook account:'; // Array[nombre del campo] = Descripción del campo
        $user_methods['instagram'] = 'Instagram account:';
        $user_methods['twitter'] = 'Twitter account:';
        $user_methods['picture'] = 'Profile personal picture:';
        
        return $user_methods;
    }
    add_action ('user_contactmethods', 'add_social_media');


    /**
     * Get the author role of an auhor's ID
     */
    function get_author_role($author_id) {
        $user_info = get_userdata($author_id); // Devuelve un array de elementos
        return implode(', ', $user_info->roles); // Con implode, convertimos el array en una cadena con los elementos separados con comas
    }


    /**
     * 
     * Add skills fields to user profile
     */
    function add_skills_fields($user) {
        echo "
            <h3>User skills</h3>
            <label for='skill1'>Skill 1</label>
            <input type='text' name='skill1' id='skill1' value='".esc_attr(get_the_author_meta('skill1', $user->ID))."'></input>

            <label for='skill2'>Skill 2</label>
            <input type='text' name='skill2' id='skill2' value='".esc_attr(get_the_author_meta('skill2', $user->ID))."'></input>

            <label for='skill3'>Skill 3</label>
            <input type='text' name='skill3' id='skill3' value='".esc_attr(get_the_author_meta('skill3', $user->ID))."'></input>

            <label for='skill4'>Skill 4</label>
            <input type='text' name='skill4' id='skill4' value='".esc_attr(get_the_author_meta('skill4', $user->ID))."'></input>

            <br>
            
            <label for='skill1V'>Skill 1 Value</label>
            <input type='text' name='skill1V' id='skill1V' value='".esc_attr(get_the_author_meta('skill1V', $user->ID))."'></input>

            <label for='skill2V'>Skill 2 Value</label>
            <input type='text' name='skill2V' id='skill2V' value='".esc_attr(get_the_author_meta('skill2V', $user->ID))."'></input>

            <label for='skill3V'>Skill 3 Value</label>
            <input type='text' name='skill3V' id='skill3V' value='".esc_attr(get_the_author_meta('skill3V', $user->ID))."'></input>

            <label for='skill4V'>Skill 4 Value</label>
            <input type='text' name='skill4V' id='skill4V' value='".esc_attr(get_the_author_meta('skill4V', $user->ID))."'></input>
            
        ";
    }
    add_action('show_user_profile', 'add_skills_fields');
    add_action('edit_user_profile', 'add_skills_fields');

    
    /**
     * Save user skills values into database
     */
    function save_skills_fields($user_id) {
        update_user_meta($user_id, 'skill1', $_POST['skill1']);
        update_user_meta($user_id, 'skill1V', $_POST['skill1V']);
        update_user_meta($user_id, 'skill2', $_POST['skill2']);
        update_user_meta($user_id, 'skill2V', $_POST['skill2V']);
        update_user_meta($user_id, 'skill3', $_POST['skill3']);
        update_user_meta($user_id, 'skill3V', $_POST['skill3V']);
        update_user_meta($user_id, 'skill4', $_POST['skill4']);
        update_user_meta($user_id, 'skill4V', $_POST['skill4V']);
    }
    add_action('personal_options_update' ,'save_skills_fields');
    add_action('edit_user_profile_update', 'save_skills_fields');

    /**
     * Check if a url returns a 200 code
     */
    function does_url_exists($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
   
        if ($code == 200) {
            $status = true;
        } else {
            $status = false;
        }
        curl_close($ch);
        return $status;
    }

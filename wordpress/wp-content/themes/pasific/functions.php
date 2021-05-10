<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // AÑADIR SOPORTES AL TEMA
    add_theme_support('post-thumbnails'); // Añade la posibilidad de elegir foto representativa

    function my_theme_scripts() {
        wp_register_script('jquery', get_template_directory_uri().'/assets/js/jQuery.js', null, null, false);
        wp_enqueue_script('jquery');

        wp_register_script('aos', get_template_directory_uri().'/assets/vendor/aos/aos.js', null, null, false);
        wp_enqueue_script('aos');

        wp_register_script('bootstrap', get_template_directory_uri().'/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', null, null, false);
        wp_enqueue_script('bootstrap');

        wp_register_script('glightbox', get_template_directory_uri().'/assets/vendor/glightbox/js/glightbox.min.js', null, null, false);
        wp_enqueue_script('glightbox');

        wp_register_script('isotope', get_template_directory_uri().'/assets/vendor/isotope-layout/isotope.pkgd.min.js', null, null, false);
        wp_enqueue_script('isotope');

        wp_register_script('validate', get_template_directory_uri().'/assets/vendor/php-email-form/validate.js', null, null, false);
        wp_enqueue_script('validate');

        wp_register_script('swiper', get_template_directory_uri().'/assets/vendor/swiper/swiper-bundle.min.js', null, null, false);
        wp_enqueue_script('swiper');

        wp_register_script('main', get_template_directory_uri().'/assets/js/main.js', null, null, false);
        wp_enqueue_script('main');

        wp_enqueue_style('style', get_stylesheet_uri()); // get_stylesheet_uri es solo para la hoja de estilos principal
        
        wp_enqueue_style('dashicons');

        wp_register_style('animate', get_template_directory_uri().'/assets/vendor/animate.css/animate.min.css', null, null, false);
        wp_enqueue_style('animate');

        wp_register_style('aos', get_template_directory_uri().'/assets/vendor/aos/aos.css', null, null, false);
        wp_enqueue_style('aos');

        wp_register_style('bootstrap', get_template_directory_uri().'/assets/vendor/bootstrap/css/bootstrap.min.css', null, null, false);
        wp_enqueue_style('bootstrap');

        wp_register_style('bootstrap-icons', get_template_directory_uri().'/assets/vendor/bootstrap-icons/bootstrap-icons.css', null, null, false);
        wp_enqueue_style('bootstrap-icons');

        wp_register_style('boxicons', get_template_directory_uri().'/assets/vendor/boxicons/css/boxicons.min.css', null, null, false);
        wp_enqueue_style('boxicons');

        wp_register_style('gligthbox', get_template_directory_uri().'/assets/vendor/glightbox/css/glightbox.min.css', null, null, false);
        wp_enqueue_style('gligthbox');

        wp_register_style('remixicon', get_template_directory_uri().'/assets/vendor/remixicon/remixicon.css', null, null, false);
        wp_enqueue_style('remixicon');

        wp_register_style('swiper', get_template_directory_uri().'/assets/vendor/swiper/swiper-bundle.min.css', null, null, false);
        wp_enqueue_style('swiper');

        wp_register_style('main', get_template_directory_uri().'/assets/css/style.css', null, null, false);
        wp_enqueue_style('main');

        wp_register_style('favicon', get_template_directory_uri().'/assets/img/favicon.png', null, null, false);
        wp_enqueue_style('favicon');

        wp_register_style('apple-touch-icon', get_template_directory_uri().'/assets/img/apple-touch-icon.png', null, null, false);
        wp_enqueue_style('apple-touch-icon');
        
    }

    add_action('wp_enqueue_scripts', 'my_theme_scripts');
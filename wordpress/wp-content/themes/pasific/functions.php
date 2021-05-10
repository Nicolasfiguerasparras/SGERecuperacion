<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // AÑADIR SOPORTES AL TEMA
    add_theme_support('post-thumbnails'); // Añade la posibilidad de elegir foto representativa

    function my_theme_scripts() {
        wp_register_script('jquery', get_template_directory_uri().'/assets/js/core/jquery.min.js', null, null, false);
        wp_enqueue_script('jquery');

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

        wp_register_script('jquery', get_template_directory_uri().'/assets/js/main/jquery.appear.js', null, null, false);
        wp_enqueue_script('jquery');

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
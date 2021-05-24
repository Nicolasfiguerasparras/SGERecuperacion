<?php
    /**
     * @package events
     * @version 1.0.1   
     */

    /*
        Plugin Name: Events
        Plugin URI: www.nico.com
        Description: Custom Post Type
        Author: Nico
        Version: 1.0.1
        Author URI: www.nico.com
        License: GNU License
    */

    // Evitar que alguien pueda ejecutar el plugin escribiendo la ruta
    defined('ABSPATH') or die ('Hey, you can not access this file... moron!');

    // Registrar nuestro custom post type
    class Events {

        function execute_actions() {
            add_action('init', array($this, 'my_custom_post_type')); // Indicamos que añada una acción al inicio llamando al método my_custom_post_type de la clase en la que estoy (en este caso, Events)
        }

        function my_custom_post_type() {
            $support = array(
                'title',
                'editor',
                // 'excerpt',
                // 'custom-fields',
                'author',
                'thumbnail',
                'comments',
            );

            $labels = array(
                'name'               =>    _x('Events', 'plural'),
                'singular_name'      =>    _x('Event', 'singular'),
                'name_admin_bar'     =>    _x('Events', 'admin bar'),
                'menu_name'          =>    _x('Events', 'admin menu'),
                'add_new'            =>    _x('Add new', 'add new'),
                'add_new_item'       =>    __('Add new Event'),
                'all_items'          =>    __('All events'),
                'new_item'           =>    __('Add New Events'),
                'search_items'       =>    __('Search Events'),
                'not_found'          =>    __('No events found'),
                'view_item'          =>    __('View Event'),
            );
            
            $args = array(
                'supports' => $support,
                'labels' => $labels,
                'label' => 'Events',
                'public' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'events'),
                'has_archive' => false,
                'hierarchical' => false,
                'menu_position' => 7,
                'show_in_menu' => true,
                'menu_icon' => 'dashicons-airplane',
            );

            register_post_type('events', $args);
        }

    }

    // Si existe la clase, la instanciamos
    if(class_exists('Events')){
        $events = new Events();
        // Una vez que la instanciamos, ejecutamos el método de la clase que me registra el custom post type
        $events->execute_actions();
    }
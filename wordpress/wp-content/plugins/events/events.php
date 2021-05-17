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

        }
    }

    // Si existe la clase, la instanciamos
    if(class_exists('Events')){
        $arquiproject = new Events();
        // Una vez que la instanciamos, ejecutamos el método de la clase que me registra el custom post type
        $arquiproject->execute_actions();
    }
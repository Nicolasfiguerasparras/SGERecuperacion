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
            // Definimos el hook para registrar el custom post type
            add_action('init', array($this, 'my_custom_post_type')); // Indicamos que añada una acción al inicio llamando al método my_custom_post_type de la clase en la que estoy (en este caso, Events)
            // Definimos el hook para crear la metabox en el custom post type
            add_action('add_meta_boxes', array($this, 'events_meta_box'));
            // Guardamos los cambios que hagamos en los campos del metabox del custom post type
            add_action('save_post', array($this, 'save_events'));

            // Añadir CSS y JS a nuestro plugin
            add_action('wp_enqueue_scripts', array($this, 'put_in_queue')); // Front-end
            add_action('admin_enqueue_scripts', array($this, 'put_in_queue')); // Back-end
        }

        /**
         * Función para encolar los CSS y JS
         */
        function put_in_queue() {
            wp_enqueue_script('eventsjs', plugins_url('js/events.js', __FILE__));
            wp_enqueue_style('eventscss', plugins_url('css/events.css', __FILE__));
        }

        /**
         * Función para registrar el custom post type con sus parámetros
         */
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
            // Registrar nuestro custom post type
            register_post_type('events', $args);
            // Habilitar el panel de etiquetas para el custom post type
            register_taxonomy_for_object_type('post_tag', 'events');
        }

        /**
         * Función para añadir las metaboxes
         */
        function events_meta_box($screens) {
            $screens = array('events');
            
            foreach($screens as $screen) {
                //           valor del id,   titulo,           callback,                         pantalla, contexto,   prioridad)
                add_meta_box('my_events_mb', 'Events Details', array($this, 'metabox_callback'), $screen, 'advanced', 'default');
            }
        }

        /**
         * Función para definir el contenido de las metaboxes
         */ 
        function metabox_callback($post) {
            // Creamos un campo nonce que vamos a usar para para comprobar que todas las peticiones se realizan desde nuestro servidor
            wp_nonce_field(__FILE__, 'events_nonce');

            // Data harvesting de los campos
            $campo1 = get_post_meta($post->ID, 'campo1', true); // Así con todos

            // Dibujar los campos de la metabox con etiquetas HTML
            echo "
                <label for='campo1'>Campo 1:</label>
                <input type='text' id='campo1' name='campo1' value='".$campo1."'>
                <label for='campo1'>Campo 1:</label>
                <input type='text' id='campo1' name='campo1' value='".$campo1."'>
            ";
            
        }

        /**
         * Función que guarda el valor de los campos del metabox del custom post type
         */
        function save_events($post_id) {
            // Determinar si el post está en autosave
            $is_autosave = wp_is_post_autosave($post_id);

            // Determinar si el post es un 'revision'
            $is_revision = wp_is_post_revision($post_id);

            // Verificar el campo nonce
            $is_valid_nonce = (isset($_POST['events_nonce']) && wp_verify_nonce($_POST['nonce_events'], basename(__FILE__))) ? 'true' : 'false';

            if ($is_autosave || $is_revision || !$is_valid_nonce) {
                return;
            }

            // Comprobar que el usuario tien permiso y aprovechamos la condición para comprobar el resto de campos anteriores
            if ( !current_user_can('edit_post', $post_id) ) {
                return $post_id;
            }

            // Sanear el contenido de los campos
            if(isset($_POST['campo1'])){
                $campo1 = sanitize_text_field($_POST['campo1']);

                // Actualizar el contenido de los campos
                update_post_meta($post_id, 'campo1', $campo1);
            }
        }

        function events_activation(){
            // Reescribir los permalinks - para que se actualicen con el custom post type
            flush_rewrite_rules();
            // Si tenemos que hacer algo con la BBDD
        }

        function events_deactivation(){
            // Si tenemos que hacer algo con la BBDD
        }

    }

    // Si existe la clase, la instanciamos
    if(class_exists('Events')){
        $events = new Events();
        // Una vez que la instanciamos, ejecutamos el método de la clase que me registra el custom post type
        $events->execute_actions();
    }
    
    register_activation_hook(__FILE__, array($events, 'events_activation'));
    register_deactivation_hook(__FILE__, array($events, 'events_deactivation'));
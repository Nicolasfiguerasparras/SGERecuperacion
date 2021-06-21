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




    // ********** FUNCIONES DE ARCHIVES ********** //

        /**
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

        /**
         * Obtener un listado con las categorías de los posts
         */
        function post_categories($post_id) {
            $cats = get_the_category($post_id);
            $string = '';
            foreach($cats as $cat) {
                $string .= "<a href='".get_category_link($cat->term_id)."'>".$cat->name."</a>";
            }

            return substr($string, 0, -2);
        }

    // ********** /funciones de archives ********** //




    // ********** PARAMETROS DE USUARIO ********** //
    
        /**
         * Añadir campos a los metadatos del usuario
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
         * Obtener el Rol de un usuario mediante su ID
         */
        function get_author_role($author_id) {
            $user_info = get_userdata($author_id); // Devuelve un array de elementos
            return implode(', ', $user_info->roles); // Con implode, convertimos el array en una cadena con los elementos separados con comas
        }


        /**
         * Añadir campos Skills al backend del usuario
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
         * Guardar los valores de los campos Skills del backend del usuario
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

    // ********** /parametros de usuario ********** //




    // ********** UTILIDADES ********** //
        
        /**
         * Comprobar si una URL nos devuelve un codigo 200
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

        /**
         * Imagenes responsivas
         */
        function add_responsive_class($content){
            if ($content=='') return;
            $post_format = get_post_format();  
            switch ($post_format){
                case 'quote': 
                    $newcontent = preg_replace('/<p([^>]+)?>/', '<p$1 class="my_quote">', $content, 1);
                    return preg_replace('/<p([^>]+)?>/', '<p$1 class="my_quote_author">', $newcontent, 2);

                break;

                default:   

                    $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
                    $document = new DOMDocument();
                    libxml_use_internal_errors(true);
                    $document->loadHTML(utf8_decode($content)); 
                    $imgs = $document->getElementsByTagName('img');
                    if (get_post_type() != 'my_app'){
                        foreach ($imgs as $img) {      
                            $img->setAttribute('class','img-responsive');
                            $img->setAttribute('width', '100%');
                            $img->setAttribute('height', '100%');
                        }
                    }
            }
            $html = $document->saveHTML();
            return $html; 
        }
        add_filter ('the_content', 'add_responsive_class');

        /**
         * Registrar widgets
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

    // ********** /utilidades ********** //




    // ********** FUNCIONES PARA LOS POSTS ********** //

        /**
         * Mostrar el número de comentarios
         */
        function get_comment_number($post_id) {
            $numcomments = get_post_meta($post_id, 'comment_number', true);

            if($numcomments == 1){
                $sufix = " Comment";
            }else{
                $sufix = " Comments";
            }

            return $numcomments.$sufix;
        }

        /**
         * Contador de visitas
         */
        function get_num_visits($post_id) {
            $numvisits = get_post_meta($post_id, 'numvisits', true);

            if($numvisits == 1){
                $sufix = " Visit";
            }else{
                $sufix = " Visits";
            }

            return $numvisits.$sufix;
        }

        /**
         * Añadir visita a post
         */
        function add_num_visits($post_id) {
            $numvisits = 1;

            // Chequear si existe ya el contador de visitas, en caso de que no, lo creamos
            if(!add_post_meta($post_id, 'numvisits', $numvisits, true)){
                
                // Solo si estamos en la plantilla single
                if(is_single()){
                    // El contador ya existe, le tenemos que añadir 1
                    $numvisits = get_post_meta($post_id, 'numvisits', true) + 1;

                    // Actualizamos el nuevo valor del contador de visitas
                    update_post_meta($post_id, 'numvisits', $numvisits);
                }

                
            }

            return $numvisits;
        }

    // ********** /funciones para los posts ********** //
    
      
    
    
    // ********** CUSTOMIZAR EL LOGIN ********** //

        /**
         * Customizar el login de WP
         */
        function customize_login() {
            ?>
                <style>
                    /* Cambiamos el logo del login form */
                    #login h1 a, .login h1 a {
                        width: 50%;
                        height: 160px;
                        
                        background-image: url("<?php echo get_template_directory_uri().'/img/logo.png' ?>");
                        background-size: cover;
                        background-position: cente center;
                        backgorund-repeat: no-repeat;
                    }

                    .login {
                        background-color: aqua;
                    }

                    #loginform{
                        background-color: aqua;
                    }

                    #login > p.message{
                        background-color: aqua;
                    }

                </style>
            <?php
        }
        add_action('login_enqueue_scripts', 'customize_login');

        /**
         * Customizar la url a la que dirige el logo del login
         */
        function customize_logo_url() {
            return home_url();
        }
        add_filter('login_headerurl', 'customize_logo_url');
    
    // ********** CUSTOMIZAR EL LOGIN ********** //
    

    

    // ********** COMENTARIOS ********** //
    
        /**
         * Mostrar la columna de consentimiento
         */
        function display_consent($column, $comment_id) {
            if($column == 'consent') {
                echo get_comment_meta($comment_id, 'consent', true);
            }
        }
        add_action('manage_comments_custom_column', 'display_consent', 1, 2);

        /**
         * Eliminar campos del formulario de contacto
         */
        function remove_comment_fields($fields) {
            unset($fields['url']);
            unset($fields['cookies']);
            return $fields;
        }
        add_filter('comment_form_default_fields','remove_comment_fields');

        /**
         * Añadir nuevos campos para el consentimiento de la política de privacidad
         */
        function imagos_add_comment_fields( $fields ) {
            $fields['consent'] = '
            <p class="comment-form-public">
                <input id="consent" name="consent" type="checkbox" />
                <label for="consent">
                    Check this box to give us permission to publicly post your Review. (Accept our <a href="#">privacy policy</a>)
                </label>
            </p>';
            return $fields;
        }
        add_filter('comment_form_default_fields', 'imagos_add_comment_fields');

        /**
         * Guardar el valor de la casilla en la BBDD
         */
        function save_comment_meta_checkbox( $comment_id ) {
            // save_comment_meta_checkbox forbidden name for this function
            $checkbox = $_POST['consent'];
            if ( $checkbox == 'on' ) {
                $value = 'Checkbox is checked: I accept the privacy policy';
            } else {
                $value = 'Checkbox is NOT checked: I do not accept';
            }
            // last argument means the field name is unique in the database table (only creates one register per comment)
            add_comment_meta( $comment_id , 'consent', $value, true );
        }
        add_action( 'comment_post', 'save_comment_meta_checkbox');

        /**
         * 
         */
        function imagos_editcomments_add_columns( $columns ) {
            $columns = array(
            'cb' => '<input type="checkbox" />',
            'author' => 'Author',
            'comment' => 'Comment',
            'consent_column' => 'Public',// Name of the new column in back-end comments area
            'response' => 'In Response To'
            );
            return $columns;
        }
        add_filter('manage_edit-comments_columns', 'imagos_editcomments_add_columns');

        /**
         * 
         */
        function imagos_consent_column($col, $comment_id){
            // you could expand the switch to take care of other custom columns
            switch($col) {
                case 'consent_column':
                    if($t = get_comment_meta($comment_id, 'consent', true)){
                        echo esc_html($t);
                    } else {
                        echo esc_html('');
                    }
                    break;
            }
        }
        add_action('manage_comments_custom_column', 'imagos_consent_column', 10, 2);

        /**
         * Customizar la plantilla de comentarios
         */
        function imagos_modify_fields_form( $args ){
            $commenter = wp_get_current_commenter();
            $req = get_option( 'require_name_email' );

            $aria_req = ( $req ? " aria-required='true'" : '' );
            $author = '<input placeholder="'.__( 'Name' ) . ( $req ? ' *' : '' ).'" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" class="blog-leave-comment-input" ' . $aria_req . ' />';
            $email = '<input placeholder="'.__( 'Email' ) . ( $req ? ' *' : '' ).'" id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) .'" class="blog-leave-comment-input" ' . $aria_req . '/>';
            $comment = '<textarea placeholder="'. _x( 'Comment', 'noun' ).'" id="comment" name="comment" class="blog-leave-comment-textarea" aria-required="true"></textarea>';
            $args['fields']['author'] = $author;
            $args['fields']['email'] = $email;
            $args['comment_field'] = $comment;
            return $args;
        }
        add_filter( 'comment_form_defaults', 'imagos_modify_fields_form' );
            
    
    // ********** /comentarios ********** //
<?php
    // /**
    //  * Template Name: Private
    //  */
    // get_header();

    // if(is_user_logged_in()){
    //     $user = wp_get_current_user();
    //     $rol = get_author_role($user->ID);
    //     $user_name = $user->display_name;
    // }

    // // Para visualizar el login
    // if(!is_user_logged_in()){
    //     $args = array(
    //         'label_username' => 'Username',
    //         'label_password' => 'Password'
    //     );
    //     wp_login_form($args);
    //     wp_register('html para el registro de nuevo usuario');
    // }else{
    //     // Sacar los botones para ir al backend y para hacer logout
    //     wp_register('', '');
    //     wp_loginout(get_permalink());

    //     // Sacar la información para el usuario loggeado
    //     switch($role){
    //         case 'administrator':
    //             break;
    //         case 'editor':
    //             break;
    //         // ...
    //     }
    // }
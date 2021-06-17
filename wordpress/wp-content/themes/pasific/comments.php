<?php
    comment_form(
        array(
            'submit_button' => '<button type="submit" name="submit" id="sendMessage" class="button-3d button-md button-block button-pasific hover-ripple-out">Send Message</button>',
            'title_reply' => ''
        )
    ); 
    $args = array (
        'style'         => 'ul',
        'callback'      => null,
        'type'          => 'comment',
        'format'        => 'html5'
    );
    // $args = array(
    //     'walker'            => null,
    //     'max_depth'         => '',
    //     'style'             => 'ul',
    //     'callback'          => null,
    //     'end-callback'      => null,
    //     'type'              => 'all',
    //     'page'              => '',
    //     'per_page'          => '',
    //     'avatar_size'       => 32,
    //     'reverse_top_level' => null,
    //     'reverse_children'  => '',
    //     'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
    //     'short_ping'        => false,   // @since 3.6
    //     'echo'              => false     // boolean, default is true
    // );
    echo wp_list_comments($args);

?>
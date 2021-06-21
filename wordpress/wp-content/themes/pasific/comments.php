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
    echo wp_list_comments($args);

?>
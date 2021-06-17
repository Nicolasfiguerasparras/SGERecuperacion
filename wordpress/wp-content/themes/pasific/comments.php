<?php
    comment_form(
        array(
            'submit_button' => '<button type="submit" name="submit" id="sendMessage" class="button-3d button-md button-block button-pasific hover-ripple-out">Send Message</button>',
            'title_reply' => ''
        )
    ); 
?>
                <!-- <div class="blog-post-comment-container"> -->
                    <?php
                        $args = array (
                            'style' => 'div',
                            'callback' => 'custom_comments',
                            'type' => 'comment',
                            'format' => 'html5',
                            'reply_text' => 'Reply'
                        );
                        wp_list_comments();
                    ?>
                <!-- </div> -->
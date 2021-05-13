<?php
    get_header();

    global $numposts;
    $numposts = 0;

    if(isset($_GET['s'])){
        $words = $_GET['s'];
    }
    echo "SEARCH FOR: ".$words;

    $numposts = $wp_the_query->found_posts;
    echo "Posts Found: ".$numposts;

?>

    <div class="container-fluid">

        <div class="col-md-8">

            <!-- resultados -->

            <?php
                if(have_posts()):
                    // Imprimir resultados
                    while(have_posts):
                        the_post();
                        get_template_part('content', 'tab');
                    endwhile;
                else:
                    echo "No posts found...";
                endif;
            ?>

        </div>

        <div>

            <!-- sidebar -->

        </div>

    </div>

<?php
    get_footer();
?>
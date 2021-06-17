<?php
    global $numposts;
    $numposts = $numposts + 1;
?>

<tr>
    <td>
        <?php echo $numposts; ?>
    </td>
    <td>
        <?php the_time('j M Y'); ?>
    </td>
    <td>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </td>
    <td>
        <?php the_author(); ?>
    </td>
</tr>
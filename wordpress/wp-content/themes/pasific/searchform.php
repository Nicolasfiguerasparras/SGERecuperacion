<form action="<?php echo home_url('/'); ?>" method="GET">
    <div class="blog-sidebar-form-search">
        <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" class="" placeholder="e.g. Kasra">
        <button type="submit" name="submit" class="pull-right"><i class="fa fa-search"></i></button>
    </div>
</form>
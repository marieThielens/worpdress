<?php get_header(); ?>

<div class="blog-main">

    <!-- Boucle des articles -->
    <?php if ( have_posts() ) {
    while ( have_posts() ) : the_post(); 
    ?>
    <div class="blog-post">
        <h2 class="blog-post-title"> <?php the_title(); ?></h2>
        <p class="blog-post-meta"><?php the_date(); ?> par <?php the_author(); ?></p>
        <?php the_content(); ?>
    </div>
    <?php endwhile; } ?>


    <nav>
        <ul class="pager">
            <li><?php next_posts_link('Previous'); ?></li>
            <li><?php previous_posts_link('Next'); ?></li>
        </ul>
    </nav>

    <?php get_sidebar();  ?>

</div><!-- blog-main -->
<?php get_footer(); ?>
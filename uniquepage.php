<?php get_header();?>

<h1>helloss</h1>

<?php
      while ( have_posts() ) :
        the_post();

            the_title();

    endwhile; // End of the loop.
?>
<?php get_footer();?>
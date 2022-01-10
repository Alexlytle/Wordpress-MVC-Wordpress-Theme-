<?php get_header(); ?>

<?php
    $route = get_query_var('route');
    $route_two = get_query_var('route_two');
?>
<h1> Hello world from <?php echo $route; ?>,<?php echo $route_two; ?></h1>
<?php get_footer(); ?>
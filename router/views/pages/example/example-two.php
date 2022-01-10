<?php get_header(); ?>


<h1>Example:Two</h1>  
   <?php echo   'Query var: ' . get_query_var("param_one");?>
   <br>
   <?php echo  'Query var: ' . get_query_var("param_two");?>
<?php get_footer(); ?>
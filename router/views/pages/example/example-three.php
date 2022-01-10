<?php get_header(); ?>

   <h1>Example:Three</h1>

  
   <?php echo  'Query var: ' . get_query_var("param_one");?>
   <br>
   <?php echo  'Query var: '. get_query_var("param_two");?>
   <br>
   <?php echo  'Query var: '. get_query_var("param_three");?>
<?php get_footer(); ?>

<div class="container">
<?php
the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
the_excerpt();
?>
</div>

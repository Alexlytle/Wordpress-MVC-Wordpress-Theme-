<?php

// WP_Json(request ,namespace, route, callback function)
//http://localhost/{your_site_name}/wp-json/namespace/v1/route


new WP_Json('GET','namespace/v1','route',function(){
    return 'hello world';
});


new WP_Json('GET','names/v1','test',function(){
    return 'hello dsf';
});


new WP_Json('POST','routerAddToCart/v1','cart',function($data){
//     global $woocommerce;
//    return $woocommerce->cart->add_to_cart(207);

$my_post = array(
    'post_title'    => $data['test'],
    'post_content'  => 'test',
    'post_status'   => 'publish',
  
  );
   return wp_insert_post($my_post);
  // Insert the post into the database
 


   
});
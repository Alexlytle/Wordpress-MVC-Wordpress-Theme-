<?php

function wordpress_router_post_types() {
 
  
    // Like Post Type
    register_post_type('example', array(
      'supports' => array('title','editor'),
      'public' => true,
      'show_ui' => true,
      // 'taxonomies' => array( 'category', 'post_tag' ),
      // 'has_archive'        => true,
      'labels' => array(
        'name' => 'Example',
        'add_new_item' => 'Add New Example',
        'edit_item' => 'Edit Example',
        'all_items' => 'All Example',
        'singular_name' => 'Example'
      ),
      'menu_icon' => 'dashicons-admin-home'
    ));




        
  }
  
  add_action('init', 'wordpress_router_post_types');
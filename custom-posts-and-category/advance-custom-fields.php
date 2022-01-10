<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(
        array(
        'key' => 'group_1',
        'title' => 'Example Section',
        'fields' => array (
            array (
                'key' => 'field_1',
                'label' => 'Example',
                'name' => 'example_title',
                'type' => 'text',
            )
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
    ));
    
    endif;
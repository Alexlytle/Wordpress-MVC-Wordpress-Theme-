<?php

class WP_Ajax{

    public $action_name;
    public function __construct($action_name,$handle_action,$logged_in) {
        $this->action_name = $action_name;
        $this->handle_action = $handle_action;
        $this->logged_in = $logged_in;
        if($logged_in == true){
            add_action('wp_ajax_' . $action_name, $handle_action);
        }else{
            add_action('wp_ajax_nopriv_' . $action_name, $handle_action);
        }
     
    }

   


}
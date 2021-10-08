<?php

function spr_add_scripts(){
  
    wp_enqueue_style('spr-main-style', plugins_url(). '/spare-plugin/css/style.css');

    wp_enqueue_script('spr-main-script', plugins_url() .'/spare-plugin/js/main.js');

}

add_action('wp_enqueue_scripts', 'spr_add_scripts');
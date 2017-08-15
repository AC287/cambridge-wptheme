<?php

// function cambridge_resources() {
//   wp_enqueue_style('style',get_stylesheet_uri());
// }
// add_action('wp_enqueue_scripts','cambridge_resources');

function cambridge_script_enqueue() {

  wp_enqueue_style('customstyle',get_template_directory_uri().'/css/cambridge.css', array(), '1.0.0', 'all');
  wp_enqueue_script('customjs',get_template_directory_uri().'/js/cambridge.js', array(), '1.0.0', true);

}

add_action('wp_enqueue_scripts', 'cambridge_script_enqueue');

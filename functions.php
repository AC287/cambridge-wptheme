<?php

// function cambridge_resources() {
//   wp_enqueue_style('style',get_stylesheet_uri());
// }
// add_action('wp_enqueue_scripts','cambridge_resources');

function cambridge_script_enqueue() {
  wp_enqueue_style('bootstrapcss',get_template_directory_uri().'/css/bootstrap.css',array(),null,'all');
  // wp_enqueue_style('bootstrapFontsEot',get_template_directory_uri().'/fonts/glyphicons-halflings-regular.eot',array(),null,'all');
  // wp_enqueue_style('bootstrapFontsSvg',get_template_directory_uri().'/fonts/glyphicons-halflings-regular.svg',array(),null,'all');
  // wp_enqueue_style('bootstrapFontsTtf',get_template_directory_uri().'/fonts/glyphicons-halflings-regular.ttf',array(),null,'all');
  // wp_enqueue_style('bootstrapFontsWoff',get_template_directory_uri().'/fonts/glyphicons-halflings-regular.woff',array(),null,'all');
  // wp_enqueue_style('bootstrapFontsWoff2',get_template_directory_uri().'/fonts/glyphicons-halflings-regular.woff2',array(),null,'all');
  wp_enqueue_style('customstyle',get_template_directory_uri().'/css/cambridge.css', array(), '1.0.0', 'all');
  // wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrapjs',get_template_directory_uri().'/js/bootstrap.js',array('jquery'),'1.0.0',true);
  wp_enqueue_script('customjs',get_template_directory_uri().'/js/cambridge.js', array('jquery'), '1.0.0', true);

}

add_action('wp_enqueue_scripts', 'cambridge_script_enqueue');
// add_filter('show_admin_bar','__return_false');

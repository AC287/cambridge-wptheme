<?php

// function cambridge_resources() {
//   wp_enqueue_style('style',get_stylesheet_uri());
// }
// add_action('wp_enqueue_scripts','cambridge_resources');

// Enable the use of shortcodes within widgets.
add_filter( 'widget_text', 'do_shortcode' );

// Assign the tag for our shortcode and identify the function that will run.
add_shortcode( 'template_directory_uri', 'wpse61170_template_directory_uri' );

// Define function
function wpse61170_template_directory_uri() {
    return get_template_directory_uri();
}

// This get url.
function custom_rewrite_tag() {
  add_rewrite_tag('%m0%', '([^&]+)');
  add_rewrite_tag('%s1%', '([^&]+)');
  add_rewrite_tag('%s2%', '([^&]+)');
  add_rewrite_tag('%s3%', '([^&]+)');
  add_rewrite_tag('%id%', '([^&]+)');
}
add_action('init', 'custom_rewrite_tag', 10, 0);

function cambridge_script_enqueue() {
  wp_enqueue_style('bootstrapcss',get_template_directory_uri().'/css/bootstrap.css',array(),null,'all');
  // wp_enqueue_style('bootstrapFontsEot',get_template_directory_uri().'/fonts/glyphicons-halflings-regular.eot',array(),null,'all');
  // wp_enqueue_style('bootstrapFontsSvg',get_template_directory_uri().'/fonts/glyphicons-halflings-regular.svg',array(),null,'all');
  // wp_enqueue_style('bootstrapFontsTtf',get_template_directory_uri().'/fonts/glyphicons-halflings-regular.ttf',array(),null,'all');
  // wp_enqueue_style('bootstrapFontsWoff',get_template_directory_uri().'/fonts/glyphicons-halflings-regular.woff',array(),null,'all');
  // wp_enqueue_style('bootstrapFontsWoff2',get_template_directory_uri().'/fonts/glyphicons-halflings-regular.woff2',array(),null,'all');
  wp_enqueue_style('customstyle',get_template_directory_uri().'/css/cambridge.css', array(), '1.0.104', 'all');
  wp_enqueue_style('slickcss',get_template_directory_uri().'/css/slick.css', array(), '1.0.2', 'all');
  wp_enqueue_style('slickthemecss',get_template_directory_uri().'/css/slick-theme.css', array(), '1.0.3', 'all');
  wp_enqueue_style( 'wpb-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
  wp_enqueue_style( 'google-fonts-questrial', 'https://fonts.googleapis.com/css?family=Questrial', false);
  // wp_enqueue_style( 'bignoodletitling', get_template_directory_uri().'/fonts/big_noodle_titling.ttf', false);

  // wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrapjs',get_template_directory_uri().'/js/bootstrap.js',array('jquery'),'1.0.0',true);
  wp_enqueue_script('customjs',get_template_directory_uri().'/js/cambridge.js', array('jquery'), '1.0.45', true);
  wp_enqueue_script('slickjs',get_template_directory_uri().'/js/slick.js', array('jquery'), '1.0.0',true);
  // wp_enqueue_script('mylib');
  // wp_enqueue_script('google-recaptcha', 'https://www.google.com/recaptcha/api.js');
}

//wp_register_script is necessary to call wp_localize_script.
//This allow javascript to get theme directory template.
wp_register_script('customjs', get_template_directory_uri().'/js/cambridge.js');
$site_parameters = array(
    'site_url' => get_site_url(),
    'theme_directory' => get_template_directory_uri()
);
wp_localize_script('customjs','siteParameters',$site_parameters);

add_action('wp_enqueue_scripts', 'cambridge_script_enqueue');
// add_filter('show_admin_bar','__return_false');

add_theme_support('post-thumbnails');
set_post_thumbnail_size(200, 150, true);

function my_excerpt_length($length) {
  return 15;
}
add_filter('excerpt_length', 'my_excerpt_length');



// wp_localize_script('mylib','WPURLS', array('siteurl'=>get_option('siteurl')));
/**
 * Google recaptcha add before the submit button
 */
/*
function add_google_recaptcha($submit_field) {
    $submit_field['submit'] = '<div class="g-recaptcha" data-sitekey="6Ld_zG4UAAAAALPR_7esBJ6jfRSu1wa0zZVHvh-n"></div><br>' . $submit_field['submit'];
    return $submit_field;
}
// if (!is_user_logged_in()) {
//     add_filter('comment_form_defaults','add_google_recaptcha');
// }
*/
/**
 * Google recaptcha check, validate and catch the spammer
 */
/*
function is_valid_captcha($captcha) {
$captcha_postdata = http_build_query(array(
                            'secret' => '6Ld_zG4UAAAAACmaLT4I56matKabtGpTLUM5kO1h',
                            'response' => $captcha,
                            'remoteip' => $_SERVER['REMOTE_ADDR']));
$captcha_opts = array('http' => array(
                      'method'  => 'POST',
                      'header'  => 'Content-type: application/x-www-form-urlencoded',
                      'content' => $captcha_postdata));
$captcha_context  = stream_context_create($captcha_opts);
$captcha_response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify" , false , $captcha_context), true);
if ($captcha_response['success'])
    return true;
else
    return false;
}

function verify_google_recaptcha() {
$recaptcha = $_POST['g-recaptcha-response'];
if (empty($recaptcha))
    wp_die( __("<b>ERROR:</b> please select <b>I'm not a robot!</b><p><a href='javascript:history.back()'>« Back</a></p>"));
else if (!is_valid_captcha($recaptcha))
    wp_die( __("<b>Go away SPAMMER!</b>"));
}
if (!is_user_logged_in()) {
    add_action('pre_comment_on_post', 'verify_google_recaptcha');
}
*/

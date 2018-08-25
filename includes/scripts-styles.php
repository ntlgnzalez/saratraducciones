<?php
/**
*CSS AND SCRIPTS FILE
*
*@package sara
*/


/**
* REGISTER AND LOAD STYLESHEETS
*
*/
function sara_theme_styles(){
  //Register Stylesheets
  wp_register_style('font-awesome', THEMEROOT . '/css/font-awesome.min.css', '', '4.7.0', 'all');
  wp_register_style('montserrat-font', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900', '', '', 'all');
  wp_register_style('bootstrap-styles', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css', '', '', 'all');
  wp_register_style('main-styles', THEMEROOT  . '/style.css', '', '', 'all');
  wp_register_style('sara-styles', get_stylesheet_uri(), array ('font-awesome', 'montserrat-font', 'bootstrap-styles'), '1.0', 'all');

  //Load stylesheets
  wp_enqueue_style('sara-styles');
}
add_action('wp_enqueue_scripts', 'sara_theme_styles');


/**
* REGISTER AND LOAD SCRIPTS
*
*/
function sara_theme_scripts(){
  //Register scripts
  wp_register_script('jquery-script', 'https://code.jquery.com/jquery-3.2.1.min.js', '', '', 'all');
  wp_register_script('tether', 'https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js', '', '', 'all');
  wp_register_script('bootstrap-script', 'https://npmcdn.com/bootstrap@4.0.0-alpha.5/dist/js/bootstrap.min.js', array('tether'), '', 'all');
  wp_register_script('bootstrap-script-2', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js', array('tether'), '', 'all');
  wp_register_script('sara-scripts', THEMEROOT  . '/js/main.js', array('jquery-script', 'bootstrap-script', 'bootstrap-script-2'), '1.0', true);

  //Load scripts
  wp_enqueue_script('sara-scripts');
}
add_action('wp_enqueue_scripts', 'sara_theme_scripts');

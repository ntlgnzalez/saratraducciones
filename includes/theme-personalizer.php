<?php
/**
* Custom personalizer,
*
*@package sara
*/

function sara_customize_register($wp_customize){
  //add header section
  $wp_customize ->add_section('sara_header', array(
      'title' => __('Header', 'sara'),
      'description' => __('Header options','sara'),
      'priority' => 11,
      'panel' => 'sara_header_panel'
  ));
  //add logo
  $wp_customize -> add_setting('sara_settings[logo]',array(
    'default' => '',
    'type' => 'theme_mod'
  ));
  $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
    'label' => __('Subir logo', 'sara'),
    'section' => 'sara_header',
    'settings' => 'sara_settings[logo]'
  )));

}
add_action('customize_register', 'sara_customize_register');

<?php
/**
* REGISTER MENU AREA
*
*@package sara
*/

function sara_menus(){
  //Register menu areas
  register_nav_menus(array(
    'main-menu' => __('Menú cabecera','sara'),
    'footer-menu' => __('Menú en pie de página','sara'),
    'footer-menu-home' => __('Menú en pie de página en Home','sara'),
    'main-menu-home' => __('Menú cabecera en Home','sara')
  ));
}
add_action('init', 'sara_menus');

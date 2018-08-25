<!DOCTYPE html>
<html id="html" <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" href="<?php echo THEMEROOT; ?>/media/logos/trendig-favicon-32x32.png" sizes="32x32" type="image/png" />
    <link rel="icon" href="<?php echo THEMEROOT; ?>/media/logos/trendig-favicon-96x96.png" sizes="96x96" type="image/png" />
    <meta name="author" content="ntlgnzalez">
    <title><?php wp_title('|','true','right'); ?><?php bloginfo('name'); ?></title>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php if(is_admin_bar_showing()): ?>
				<style media-"screen">
					@media all and (min-width:782px){
						header .position-fixed{
							top:32px !important;
						}
					}
					@media all and (max-width:782px) and (min-width:600px){
						header .position-fixed{
							top:46px !important;
						}
					}
				</style>
		<?php endif; ?>

		<?php wp_head(); ?>
</head>

<body id="body">
  <a href="#body" class="go-to-top-btn anchor-point-link round-btn "><i class="fa fa-sort-up"></i></a>
<section class="<?php if (is_front_page()): ?>grey-background <?php else: ?>white-background <?php endif; ?>padding-bottom-20 ">
  <header>
    <div class="menu-container <?php if (is_front_page()): ?>grey-background <?php else: ?>white-background  <?php endif; ?>">
        <div class="container">
            <nav>
                <h1>
                  <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                    <?php

                      $args = array(
                          'post_type'=> 'logo',
                          'areas'    => '',
                          'order'    => 'ASC'
                          );

                      $the_query = new WP_Query( $args );
                      if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

                      ?>
                    <img src="<?php the_field('sara_gutierrez_traducciones_logo'); ?>" alt="sara-gutierrez-traducciones" title="sara-gutierrez-traducciones"></a>
                  <?php endwhile; ?>
                <?php endif; wp_reset_postdata(); ?>
                </h1>
                <button id="menu-btn" class="menu-btn">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="menu-hidden-mobile">
                  <?php if (is_front_page()) { ?>
    								<?php wp_nav_menu(array(
    									'theme_location' => 'main-menu-home'
    								)); ?>
                  <?php }else {?>
                    <?php wp_nav_menu(array(
                      'theme_location' => 'main-menu'
                    )); ?>
                  <?php } ?>
                  <div class="language-buttons">
                    <li class="nav-item language-button">
                      <button id="english-btn" class="language-btn">ENG</button>
                    </li>
                    <li class="nav-item language-button">
                      <button id="spanish-btn" class="language-btn">ESP</button>
                    </li>
                  </div>
                </div>
            </nav>
        </div>
    </div>

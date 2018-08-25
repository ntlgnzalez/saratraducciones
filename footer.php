<!--//Footer-->
<footer>
<section class="blue-background footer-menu-section">
  <nav class="">
    <div class="container">
      <?php if (is_front_page()) { ?>
        <?php wp_nav_menu(array(
          'theme_location' => 'footer-menu-home'
        )); ?>
      <?php }else {?>
        <?php wp_nav_menu(array(
          'theme_location' => 'footer-menu'
        )); ?>
      <?php } ?>
    </div>
  </nav>
</section>
<section class="copyright-section padding-top-10 text-center">
  <div class="container">
    <p class="blue-text">saragutierrez© 2018</p>
  </div>
</section>
</footer>

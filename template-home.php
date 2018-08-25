<?php
/**
* Template name: home
*Template for home
*
*@package sara
*/
?>
<?php get_header(); ?>
<div class="container">
        <div id="sobre-mi" class="curriculum-container">
          <!-- Variables of all the fields -->
          <?php
            // Variables Studies
            // $titulo_destacado = get_post_meta($post -> ID, 'titulo_destacado', true);
            // $estudio_licenciatura = get_post_meta($post -> ID, 'estudio-licenciatura', true);
            // $estudio_licenciatura_lugar = get_post_meta($post -> ID, 'estudio-licenciatura-lugar', true);
            // $estudio_master = get_post_meta($post -> ID, 'estudio-master', true);
            // $estudio_master_lugar = get_post_meta($post -> ID, 'estudio-master-lugar', true);
            // // Languajes
            // $idiomas_nativos_titular = get_post_meta($post -> ID, 'idiomas-nativos-titular', true);
            // $idiomas_nativos = get_post_meta($post -> ID, 'idiomas-nativos', true);
            // $principales_lenguas_titular = get_post_meta($post -> ID, 'principales-lenguas-titular', true);
            // $principales_lenguas = get_post_meta($post -> ID, 'principales-lenguas', true);
            // $otros_idiomas_titular = get_post_meta($post -> ID, 'otros-idiomas-lenguas-titular', true);
            // $otros_idiomas = get_post_meta($post -> ID, 'otros-idiomas-lenguas', true);
            // //About me
            // $experiencia_titulo = get_post_meta($post -> ID, 'experiencia-titulo', true);
            // $experiencia_titulo_years = get_post_meta($post -> ID, 'experiencia-titulo-years', true);
            // $experiencia_subtitulo = get_post_meta($post -> ID, 'experiencia-subtitulo', true);
            // $experiencia_texto = get_post_meta($post -> ID, 'experiencia-texto', true);
            //
            // // btns
            // $link_btn_azul = get_post_meta($post -> ID, 'link-btn-azul', true);
            // $texto_btn_azul = get_post_meta($post -> ID, 'texto-btn-azul', true);
            // $link_btn_blanco = get_post_meta($post -> ID, 'link-btn-blanco', true);
            // $texto_btn_blanco = get_post_meta($post -> ID, 'texto-btn-blanco', true);
           ?>
          <h2><?php the_field('title'); ?></h2>
          <p>
            <i class="fa fa-graduation-cap padding-right-10 blue-text" aria-hidden="true"></i> <span class="study-title text-bold"><?php the_field('studies_bachellor'); ?></span>
          </p>
          <p>
            <i class="fa fa-bookmark-o padding-right-20 blue-text" aria-hidden="true"></i> <span class="study-title text-bold"><?php the_field('studies_master'); ?></span>
          </p>
          <div class="row languages-containers">
            <div class="languages-container languages-container-1 col-12 col-md-3">
              <h3><?php the_field('native_languages_title'); ?></h3>
              <p><?php the_field('native_languages'); ?></p>
            </div>
            <div class="languages-container languages-container-2 col-12 col-md-3">
              <h3><?php the_field('main_languages_title'); ?></h3>
              <p><?php the_field('main_languages'); ?></p>
            </div>
            <div class="languages-container languages-container-3 col-12 col-md-3">
              <h3><?php the_field('other_languages_title'); ?></h3>
              <p><?php the_field('other_languages'); ?></p>
            </div>
          </div>
          <div class="work-experience-container row ">
            <div class="col-12 col-md-9">
              <h4 class="text-24"><?php the_field('experience_title_black'); ?> <span class="experience-years blue-text"><?php the_field('experience_title_blue'); ?></span></h4>
              <p><?php the_field('experience_text_short'); ?>
                <!-- php echo esc_url(var de link);?> -->
              </p><div></div>
              <button id="more-info-btn"><?php the_field('more_about_me_btn'); ?> <i class="fa fa-angle-down blue-text" aria-hidden="true"></i></button>
              <div class="hidden more-info-container padding-top-10">
                <?php the_field('experience_text_long'); ?>
              </div>
            </div>
             <div class="about-me-buttons-section col-12">
                <a class="anchor-point-link btn blue-btn" href="<?php the_field('blue_button_link'); ?>"><?php the_field('blue_button_text'); ?></a>
                <a class="anchor-point-link btn white-btn margin-left-20" target="_blank" href="<?php the_field('white_button_link'); ?>"><?php the_field('white_button_text'); ?></a>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="#idiomas" class="hide-show-btn white-btn round-btn anchor-point-btn"><i class="fa fa-angle-down blue-text" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
  </header>

</section>
<!--<div class="round-background"></div>-->
<section id="idiomas" class="text-center padding-bottom-60 padding-top-60">
  <div class="container">
    <h2><?php the_field('languages_title'); ?>
    </h2>
    <div class="row justify-content-center">
      <div class="col-12 col-md-9">
        <?php the_field('languages_description'); ?>
      </div>
    </div>
    <div class="foregin-languages row justify-content-center">
        <div class="col-12">
          <h3 class="subtitle"><?php the_field('foreign_languages_title'); ?></h3>
        </div>

        <?php $foreign_languages_array = array(
          	'posts_per_page'   => '',
          	'offset'           => 0,
          	'category'         => '',
          	'category_name'    => '',
          	'orderby'          => 'date',
          	'order'            => 'ASC',
          	'include'          => '',
          	'exclude'          => '',
          	'meta_key'         => '',
          	'meta_value'       => '',
          	'post_type'        => 'foreign-language',
          	'post_mime_type'   => '',
          	'post_parent'      => '',
          	'author'	   => '',
          	'author_name'	   => '',
          	'post_status'      => 'publish',
          	'suppress_filters' => true
          );
          $foreign_languages = get_posts( $foreign_languages_array );
        	foreach($foreign_languages as $post)
        	{
          ?>
            <div class=" col-12 col-sm-6 col-md-3 margin-top-10 margin-bottom-10">
              <div class="blue-border-container">
                <?php the_field('f-language-title'); ?>
              </div>
            </div>
        	<?php
        }
        ?>
  </div>
  <div class="row justify-content-center">
    <div class="col-12">
      <img src="<?php echo IMAGES; ?>/arrow-down.svg" class="height-50 margin-top-20 margin-bottom-10">
    </div>
  </div>
  <div class="mother-languages row justify-content-center  margin-bottom-20">
      <div class="col-12">
        <h3 class="subtitle">LENGUAS MATERNAS</h3>
      </div>

      <?php $mother_languages_array = array(
          'posts_per_page'   => '',
          'offset'           => 0,
          'category'         => '',
          'category_name'    => '',
          'orderby'          => 'date',
          'order'            => 'ASC',
          'include'          => '',
          'exclude'          => '',
          'meta_key'         => '',
          'meta_value'       => '',
          'post_type'        => 'mother-language',
          'post_mime_type'   => '',
          'post_parent'      => '',
          'author'	   => '',
          'author_name'	   => '',
          'post_status'      => 'publish',
          'suppress_filters' => true
        );
        $mother_languages = get_posts( $mother_languages_array );
        foreach($mother_languages as $post)
        {
        ?>
          <div class=" col-12 col-sm-6 col-md-3 margin-top-10 margin-bottom-10">
            <div class="blue-border-container">
              <?php the_field('m-language-title'); ?>
            </div>
          </div>
        <?php
      }
      ?>
      <?php wp_reset_postdata(); ?>
    </div>
    <div class="row">
      <div class="col-12">
        <a class="anchor-point-btn btn blue-btn" href="<?php the_field ('languages_blue_button_link'); ?>"><?php the_field('languages_blue_button_text'); ?></a>
      </div>
    </div>
  </div>
</section>
<section id="especialidades" class="grey-background padding-bottom-60 padding-top-60">
  <div class="container">
    <h2><?php the_field('specialities'); ?>
    </h2>
    <div class="row">
      <div class="col-12 col-md-10 col-lg-9">
        <?php the_field('specialities_description'); ?>
      </div>
    </div>
    <div class="row padding-top-10 padding-bottom-20">
      <?php $mother_languages_array = array(
          'posts_per_page'   => '',
          'offset'           => 0,
          'category'         => '',
          'category_name'    => '',
          'orderby'          => 'date',
          'order'            => 'ASC',
          'include'          => '',
          'exclude'          => '',
          'meta_key'         => '',
          'meta_value'       => '',
          'post_type'        => 'speciality',
          'post_mime_type'   => '',
          'post_parent'      => '',
          'author'	   => '',
          'author_name'	   => '',
          'post_status'      => 'publish',
          'suppress_filters' => true
        );
        $mother_languages = get_posts( $mother_languages_array );
        foreach($mother_languages as $post)
        {
        ?>
        <div class="speciality-and-explanation-container col-12 col-sm-6 col-lg-2 margin-top-10 margin-bottom-10">
            <div class="speciality-container white-container-clickable">

              <img src="<?php the_field('speciality_icon_url'); ?>" alt="<?php the_field('icon_alt'); ?>" title="<?php the_field('icon_title'); ?>" class="speciality-icon">
              <h3 class="speciality-title"><?php the_field('speciality_title'); ?></h3>
            </div>
            <div class="explanation-container hidden">
                <i class="fa fa-times" aria-hidden="true"></i>
                <img class="arrow" src="<?php echo IMAGES; ?>/arrow.png">
              <div class="white-background ">
                  <?php the_field('speciality_description'); ?>
              </div>
            </div>
        </div>
        <?php
      }
      ?>
      <?php wp_reset_postdata(); ?>
    </div>
    <div class="row">
      <div class="col-12 col-md-10 col-lg-9 text-20">
        <?php the_field('contact_cta'); ?>
      </div>
    </div>
  </div>
</section>
<section id="presupuesto" class="blue-background white-text padding-bottom-60 padding-top-60 text-center">
  <div class="container">
    <h2 class="white-text "><?php the_field('contact_title'); ?>
    </h2>
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        <?php the_field('contact_description'); ?>
          <a class="anchor-point-btn btn white-btn" href="@mailto:saragutiva@gmail.com">envíame un email</a>
      </div>
    </div>
  </div>
</section>
<section id="blog" class="grey-background padding-bottom-20 padding-top-20">
  <?php if(have_posts()): ?>
    <div class="container padding-top-40 padding-bottom-40">
      <div class="row justify-content-center">
        <?php // Display blog posts on any page @ https://m0n.co/l
    		$temp = $wp_query; $wp_query= null;
    		$wp_query = new WP_Query(); $wp_query->query('posts_per_page=3' . '&paged='.$paged);
    		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <?php if(has_post_thumbnail()): ?>
          <div class="col-12 col-md-4 blog-post-container">
              <div class="blue-container-clickable ">
                <div class="image-post-preview">
                  <div class="color-filter"></div>
                  <?php $post_image= wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large'); ?>
                  <img src="<?php echo $post_image[0]; ?>">
                </div>
                <div class="text-post-preview">
                  <p class="white-text"><?php  echo get_the_date('d.m.y'); ?></p>
                  <a href="<?php the_permalink(); ?>" class="" target="_blank">
                    <h3 class="white-text text-20 "><?php the_title(); ?></h3>
                  </a>
                  <a href="<?php the_permalink(); ?>" class="" target="_blank">
                    <p href="<?php the_permalink(); ?>" class="white-text text-right"  target="_blank">Leer más <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                  </a>
                </div>
              </div>
          </div>
        <?php else: ?>
          <div class="col-12 col-md-4 blog-post-container margin-bottom-20">
              <div class="white-container-clickable ">
                <a href="<?php the_permalink(); ?>" class="" target="_blank">
                  <h3 class="blue-text text-20 "><?php the_title(); ?></h3>
                  <div class="padding-top-10 black-text"><?php the_excerpt(); ?>
                  </div>
                  <p href="<?php the_permalink(); ?>" class="blue-text text-right"  target="_blank">Leer más <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                </a>
              </div>
          </div>
        <?php endif; ?>
        <?php endwhile; ?>

      </div>
    </div>
  <?php endif; ?>
</section>
<?php get_footer();?>
<?php wp_footer(); ?>
</body>
</html>

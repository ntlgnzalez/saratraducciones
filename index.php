<?php
/**
* Template name: blog
*Template for blog
*
*@package sara
*/
?>
<?php get_header(); ?>
</header>
</section>
<section class="padding-bottom-20 ">
  <div class="container padding-top-40 padding-bottom-40">
    <div class="row ">
      <div class="col-12 col-md-9 text-align-left">
        <h2><?php the_field('blog_title', get_option('page_for_posts')); ?></h2>
      </div>
      <div class="col-12 col-md-9 text-align-left">
        <?php the_field('blog_description', get_option('page_for_posts')); ?>
      </div>
      <!-- <div class="col-12 col-md-3 text-align-left">
        <?php if(have_posts('post')):
          $taxonomy = $posts['taxonomy'];

          $term_name_of_the_current_post = wp_get_object_terms( $post->ID, $taxonomy, [ 'fields' => 'names' ] )[0];

          $all_term_names = get_terms( $taxonomy, [ 'fields' => 'names', 'hide_empty' => false ] );
          ?>
          <label>
              <?php esc_html_e( 'Please choose:' ); ?>
              <select name="tax_input[<?php echo esc_attr( $taxonomy ); ?>]" value="Tags">
                  <?php foreach ( $all_term_names as $term_name ) : ?>
                      <option <?php selected( $term_name_of_the_current_post, $term_name ); ?>>
                          <?php echo esc_html( $term_name ); ?>
                      </option>
                  <?php endforeach; ?>
              </select>
          </label>
        <?php endif; ?>
      </div> -->
    </div>
  </div>
</section>
<section id="blog" class="grey-background padding-bottom-20 padding-top-20">

  <?php if(have_posts()): ?>
    <div class="container padding-top-40 padding-bottom-40">
      <div class="row justify-content-center">

        <?php
        while (have_posts()) : the_post(); ?>
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
                    <span class="white-text">
                      <?php
                      $tags = get_the_tags();
                        if ($tags) {
                      ?>
                          <i class="fa fa-tag white-text"></i>
                      <?php
                            $numItems = count($tags);
                            $i = 0;
                            foreach( $tags as $tag ) {
                              $numItems = count($tags);

                                ?><a href="<?php echo get_tag_link($tag->term_id);?>" class="tag-link white-text"><?php echo $tag->name;?></a>
                                <?php

                                  if(++$i !== ($numItems)) {
                                    echo ", ";
                                  }
                            }
                          }
                        ?>
                      </span>
                      <a href="<?php the_permalink(); ?>" class="" target="_blank">
                        <p href="<?php the_permalink(); ?>" class="white-text text-right"  target="_blank">Leer más <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                      </a>
                  </div>
                </div>
            </div>
          <?php else: ?>

            <div class="col-12 col-md-4 blog-post-container">
                <div class="white-container-clickable ">
                  <p><?php  echo get_the_date('d.m.y'); ?></p>

                  <a href="<?php the_permalink(); ?>" class="" target="_blank">
                    <h3 class="blue-text text-20 "><?php the_title(); ?></h3>
                  </a>
                  <span>
                    <?php
                    $tags = get_the_tags();
                      if ($tags) {
                    ?>
                        <i class="fa fa-tag"></i>
                    <?php
                          $numItems = count($tags);
                          $i = 0;
                          foreach( $tags as $tag ) {
                            $numItems = count($tags);

                              ?><a href="<?php echo get_tag_link($tag->term_id);?>" class="tag-link"><?php echo $tag->name;?></a>
                              <?php

                                if(++$i !== ($numItems)) {
                                  echo ", ";
                                }
                          }
                      }
                    ?>
                  </span>
                  <a href="<?php the_permalink(); ?>" class="" target="_blank">
                    <div class="padding-top-5 black-text"><?php the_excerpt(); ?>
                    </div>
                    <p href="<?php the_permalink(); ?>" class="blue-text text-right"  target="_blank">Leer más <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                  </a>
                </div>
            </div>
          <?php endif; ?>
        <?php endwhile; ?>
      </div>
      <div class="row justify-content-center ">
        <div class="col-6 next-prev-posts">
          <?php previous_posts_link('<i class="fa fa-angle-double-left"></i>'); ?>
        </div>
        <div class="col-6 next-prev-posts">
        <?php next_posts_link('<i class="fa fa-angle-double-right"></i>'); ?>
      </div>
    </div>
  <?php endif; ?>
</section>

<?php get_footer();?>
<?php wp_footer(); ?>
</body>
</html>

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
        <h2><?php the_field('blog_title'); ?></h2>
      </div>
      <div class="col-12 col-md-9 text-align-left">
        <?php the_field('blog_description'); ?>
      </div>
      <div class="col-12 col-md-3 text-align-left">
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
        $wp_query = new WP_Query(); $wp_query->query('posts_per_page=20' . '&paged='.$paged);
        while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <div class="col-12 col-md-4 blog-post-container">
              <div class="white-container-clickable ">
                <p><?php the_date('d.m.y'); ?></p>
                <a href="<?php the_permalink(); ?>" class="" target="_blank">
                  <h3 class="blue-text text-20 "><?php the_title(); ?></h3>
                  <div class="padding-top-10 black-text"><?php the_excerpt(); ?>
                  </div>
                  <p href="<?php the_permalink(); ?>" class="blue-text text-right"  target="_blank">Leer más <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                </a>
              </div>
          </div>
        <?php endwhile; ?>

      </div>
    </div>
  <?php endif; ?>
</section>

<?php get_footer();?>
<?php wp_footer(); ?>
</body>
</html>

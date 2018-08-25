<?php
/**
* Template name: single-page
*Template for single pages
*
*@package sara
*/
?>
<?php get_header(); ?>
</header>
</section>
<section class="padding-bottom-20 ">
  <div class="container padding-bottom-10">
    <div class="row  ">
      <?php if(has_post_thumbnail()): ?>
        <div class="col-12 text-align-left post-image-container">
          <div class="color-filter"></div>
          <?php $post_image= wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
          <img src="<?php echo $post_image[0]; ?>">
        </div>
      <?php endif; ?>
      <div class="col-12 col-md-9 text-align-left padding-top-20">
        <h2 class="padding-bottom-10"><?php the_title();?></h2>
        <p class="tags-in-post-preview"><span class="padding-right-10"><?php  echo get_the_date('d.m.y'); ?></span>
          <?php
          $tags_individual_post = get_the_tags();
            if ($tags_individual_post) {
          ?>
              <i class="fa fa-tag"></i>
          <?php
                $numItems = count($tags_individual_post);
                $i = 0;
                foreach( $tags_individual_post as $tag ) {
                  $numItems = count($tags_individual_post);

                    ?><a href="<?php echo get_tag_link($tag->term_id);?>" class="tag-link"><?php echo $tag->name;?></a>
                    <?php

                      if(++$i !== ($numItems)) {
                        echo ", ";
                      }
                }
            }
            $array_tags_individual_post = array();
            foreach($tags_individual_post  as $tag) {
             $array_tags_individual_post[] = $tag->name;
            }
          ?>
        </p>
      </div>
    </div>
  </div>
</section>
<section class="grey-background padding-bottom-20 padding-top-10">
    <div class="container padding-top-40 padding-bottom-40">
      <div class="row">
        <div class="col-12 col-md-9 text-align-left">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif; wp_reset_query(); ?>
        </div>
      </div>
    </div>
</section>
<section>

  <div class="container padding-top-40 padding-bottom-40">
    <div class="row ">
      <div class="col-12 col-md-9 text-align-left padding-top-40">
        <?php
        $page = get_page_by_title('Single Post');
        $t= $page->other_related_post_title;
        echo '<h3 class="padding-bottom-30 text-bold blue-text text-38">'.apply_filters('post_title', $t).'</h3>';

        wp_reset_postdata(); //resetting the page query
        ?>
      </div>
    </div>
    <?php if(have_posts()): ?>
    <div class="row justify-content-center">
      <?php // Display blog posts on any page @ https://m0n.co/l
        $temp = $wp_query; $wp_query= null;
        $wp_query = new WP_Query(); $wp_query->query('posts_per_page=-1' . '&paged='.$paged);
        $n=1;
        while ($wp_query->have_posts()) : $wp_query->the_post();
          $tags_other_post = wp_get_post_tags($post->ID);

          $array_tags_other_post = array();
          foreach($tags_other_post  as $tag) {
            $array_tags_other_post[] = $tag->name;
          }
          if($n <= 6):
            if(array_intersect($array_tags_individual_post, $array_tags_other_post )):?>
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
                  <div class="col-12 col-md-4 blog-post-container margin-bottom-20">
                      <div class="grey-container-clickable ">
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
            <?php  $n ++;
          endif;?>
          <?php  endif; ?>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
    <div class="row justify-content-center">
      <div class="col-auto">
        <?php
        $page = get_page_by_title('Single Post');
        $b= $page->go_blog_button_text;?>
        <a class="btn blue-btn" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
          <?php echo ''.apply_filters('post_title', $b).'</a>';
          wp_reset_postdata(); //resetting the page query
          ?>
      </div>
    </div>
  </div>
</section
<?php get_footer();?>
<?php wp_footer(); ?>
</body>
</html>

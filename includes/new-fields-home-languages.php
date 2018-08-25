<?php
/**
* New editable fields in home page
*
*@package sara
*/

function sara_new_metaboxes_home_languages(){
    add_meta_box('data-languages', __('texto personalizado en la sección idiomas'), 'sara_metabox_languages', 'page', 'normal', 'high');
}
add_action('add_meta_boxes', 'sara_new_metaboxes_home_languages');


//LANGUAGES
$sara_custom_fields_home_languages = array(
  array(
    'label' => __('Título idiomas', 'sara'),
    'id' => 'titulo_idiomas',
    'description' => 'introduce titulo para idiomas',
    'type' => 'text'
  ),
  array(
    'label' => __('Título destacado I 2', 'sara'),
    'id' => 'titulo_destacado-I-2',
    'description' => 'introduce titulo i 2',
    'type' => 'text'
  )
);

function sara_metabox_languages(){
  global $sara_custom_fields_home_languages, $post;

  wp_nonce_field('sara_metabox_languages_nonce','meta_box_languages_nonce');

  foreach($sara_custom_fields_home_languages as $field){
      //get the value of the fields
      $meta = get_post_meta($post->ID, $field['id'], true);
      ?>
        <p>
          <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label><br>
          <input id="<?php echo $field['id']; ?>" class="widefat" type="text" name="<?php echo $field['id']; ?>" value="<?php echo $meta ?>">
          <span class="howto"><?php echo $field['description']; ?></span>
        </p>
      <?php
  }
}

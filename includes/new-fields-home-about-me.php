<?php
/**
* New editable fields in home page
*
*@package sara
*/

function sara_new_metaboxes_home(){
    add_meta_box('data-about-me', __('ABOUT ME'), 'sara_metabox_about_me', 'page', 'normal', 'high');
}
add_action('add_meta_boxes', 'sara_new_metaboxes_home');

//ABOUT ME
$sara_custom_fields_home_about_me = array(
  array(
    'label' => __('Título destacado', 'sara'),
    'id' => 'titulo_destacado',
    'description' => 'introduce titulo',
    'type' => 'text'
  ),
  array(
    'label' => __('Estudio Licenciatura', 'sara'),
    'id' => 'estudio-licenciatura',
    'description' => 'introduce estudio licenciatura',
    'type' => 'text'
  ),
  array(
    'label' => __('Estudio Licenciatura Lugar', 'sara'),
    'id' => 'estudio-licenciatura-lugar',
    'description' => 'introduce dónde licenciatura',
    'type' => 'text'
  ),
  array(
    'label' => __('Estudio Master', 'sara'),
    'id' => 'estudio-master',
    'description' => 'introduce estudio master',
    'type' => 'text'
  ),
  array(
    'label' => __('Estudio Master Lugar', 'sara'),
    'id' => 'estudio-master-lugar',
    'description' => 'introduce dónde master',
    'type' => 'text'
  ),
  array(
    'label' => __('Idiomas Nativos Titular', 'sara'),
    'id' => 'idiomas-nativos-titular',
    'description' => 'introduce titular para idiomas nativos',
    'type' => 'text'
  ),
  array(
    'label' => __('Idiomas Nativos', 'sara'),
    'id' => 'idiomas-nativos',
    'description' => 'introduce idiomas nativos',
    'type' => 'text'
  ),
  array(
    'label' => __('Principales Lenguas Titular', 'sara'),
    'id' => 'principales-lenguas-titular',
    'description' => 'introduce titular para principales lenguas',
    'type' => 'text'
  ),
  array(
    'label' => __('Principales Lenguas', 'sara'),
    'id' => 'principales-lenguas',
    'description' => 'introduce principales lenguas de trabajo',
    'type' => 'text'
  ),
  array(
    'label' => __('Otros Idiomas/Lenguas Titular', 'sara'),
    'id' => 'otros-idiomas-lenguas-titular',
    'description' => 'introduce titular para otros idiomas/lenguas',
    'type' => 'text'
  ),
  array(
    'label' => __('Otros Idiomas/Lenguas', 'sara'),
    'id' => 'otros-idiomas-lenguas',
    'description' => 'introduce otros idiomas/lenguas',
    'type' => 'text'
  ),
  array(
    'label' => __('Experiencia Título', 'sara'),
    'id' => 'experiencia-titulo',
    'description' => 'Título experiencia',
    'type' => 'text'
  ),
  array(
    'label' => __('Experiencia Título Años', 'sara'),
    'id' => 'experiencia-titulo-years',
    'description' => 'introduce años de experiencia',
    'type' => 'text'
  ),
  array(
    'label' => __('Experiencia Extensa', 'sara'),
    'id' => 'experiencia-texto',
    'description' => 'introduce experiencia',
    'type' => 'textarea'
  ),
  array(
    'label' => __('Botón Azul Link', 'sara'),
    'id' => 'link-btn-azul',
    'description' => 'introduce el link a donde quieres que lleve este botón',
    'type' => 'text'
  ),
  array(
    'label' => __('Texto Botón Azul', 'sara'),
    'id' => 'texto-btn-azul',
    'description' => 'introduce el texto para el botón',
    'type' => 'text'
  ),
  array(
    'label' => __('Botón Blanco Link', 'sara'),
    'id' => 'link-btn-blanco',
    'description' => 'introduce el link a donde quieres que lleve este botón',
    'type' => 'text'
  ),
  array(
    'label' => __('Texto Botón Blanco', 'sara'),
    'id' => 'texto-btn-blanco',
    'description' => 'introduce el texto para el botón',
    'type' => 'text'
  )
);

function sara_metabox_about_me(){
  global $sara_custom_fields_home_about_me, $post;

  wp_nonce_field('sara_metabox_about_me_nonce','meta_box_nonce');

  foreach($sara_custom_fields_home_about_me as $field){
      //get the value of the fields
      $meta = get_post_meta($post->ID, $field['id'], true);
      ?>
        <p>
          <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label><br>
          <?php if($field['id'] == 'experiencia-texto'){?>
            <textarea id="<?php echo $field['id']; ?>" class="widefat" type="textarea" name="<?php echo $field['id']; ?>"></textarea>
          <?php }else{ ?>
            <input id="<?php echo $field['id']; ?>" class="widefat" type="text" name="<?php echo $field['id']; ?>" value="<?php echo $meta ?>">
          <?php } ?>
          <span class="howto"><?php echo $field['description']; ?></span>
        </p>
      <?php
  }
  // wp_editor( htmlspecialchars_decode( get_post_meta($post->ID, 'experiencia-metaname' , true ) ), 'experiencia-texto', array('textarea_name'=>'experiencia', 'label'=>'experiencia text box') );

}


function save_sara_metabox_home_about_me($post_id){
  global $sara_custom_fields_home_about_me;

  //Verify nonce sending
  if(!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'sara_metabox_about_me_nonce')){
    return;
  }

  //Block autosave
  if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
    return;
  }
  //Verify that what is going to be save is a page and the user has editing rights for that
  if($_POST['post_type'] == 'page'){
    if(!current_user_can('edit_page', $post_id)){
      return;
    }
  }


  //loop all the fields
  foreach($sara_custom_fields_home_about_me as $field){
    //get the old value of the fields
    $old_data = get_post_meta($post_id, $field['id'], true);
    $new_data = $_POST[$field['id']];
    if($new_data && $new_data != $old_data){
      update_post_meta($post_id, $field['id'], $new_data);
    }elseif($new_data == '' && $old_data){
      delete_post_meta($post_id, $field['id'], $old_data);
    }
  }
}
add_action('save_post', 'save_sara_metabox_home_about_me');




function show_hide_sara_metabox_home_about_me(){
  ?>
    <style media="screen">
      #data-about-me{
        display:none;
      }
    </style>
    <script type="text/javascript">
      jQuery(document).ready(function($){
        function show_hide_about_me(){
          if($('#page_template').attr('value') == ('index.php')){
            $('#data-about-me').slideDown();
          }else{
            $('#data-about-me').slideUp();
          }
        }
        $('#data-about-me-hide').parent().remove();
        show_hide_about_me();

        $('#page_template').on('change', function(){
          show_hide_about_me();
        });

      });
    </script>
  <?php
}
add_action('admin_head', 'show_hide_sara_metabox_home_about_me');

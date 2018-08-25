<?php
/**
*Sara Gutierrez
*
*@package sara
*/


/**
* DEFINE CONSTANTS
*
*/
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT . '/img');


/**
* DEFINE THEME CHARACTERISTICS
*
*/
// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 1280;


// Register Theme Features
function sara_custom_theme_features()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'quote', 'image', 'video', 'audio', 'link' ) );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );

	 // Set custom thumbnail dimensions
	set_post_thumbnail_size( 300, 300, true );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

	// Add theme support for custom CSS in the TinyMCE visual editor
	add_editor_style( 'editor-style.css' );

	// Add theme support for Translation
	load_theme_textdomain( 'sara', get_template_directory() . '/languages' );

  //Add custom image set_post_thumbnail_size
  add_image_size('blog-size-image', 820, 615, true);
}
add_action( 'after_setup_theme', 'sara_custom_theme_features' );



/**
* LOAD STYLES AND SCRIPTS
*
*/
require_once('includes/scripts-styles.php');


/**
* ADDING MENU
*
*/
require_once('includes/menus.php');


/**
* ADDING OPTIONS TO PERSONALIZER
*
*/
require_once('includes/theme-personalizer.php');




/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


/**
* ADDING FOREIGN LANGUAGES LIKE POST
*
*/
add_action( 'init', 'create_foreign_language' );
function create_foreign_language() {
    register_post_type( 'foreign-language',
        array(
            'labels' => array(
                'name' => __( 'Foreign Languages' ),
                'singular_name' => __( 'Foreign Language' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'foreign-language'),
        )
    );
}


/**
* ADDING MOTHER LANGUAGES LIKE POST
*
*/
add_action( 'init', 'create_mother_language' );
function create_mother_language() {
    register_post_type( 'mother-language',
        array(
            'labels' => array(
                'name' => __( 'Mother Languages' ),
                'singular_name' => __( 'Mother Language' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'mother-language'),
        )
    );
}

/**
* ADDING Specialities LIKE POST
*
*/
add_action( 'init', 'create_speciality' );
function create_speciality() {
    register_post_type( 'speciality',
        array(
            'labels' => array(
                'name' => __( 'Specialities' ),
                'singular_name' => __( 'Speciality' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'speciality'),
        )
    );
}


/**
* ADDING Logo
*
*/
add_action( 'init', 'create_logo' );
function create_logo() {
    register_post_type( 'logo',
        array(
            'labels' => array(
                'name' => __( 'Logos' ),
                'singular_name' => __( 'Logo' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'logo'),
        )
    );
}

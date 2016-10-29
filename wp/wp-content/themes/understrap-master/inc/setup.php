<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 * @package understrap
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'understrap_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function understrap_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on understrap, use a find and replace
	 * to change 'understrap' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'understrap', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'understrap' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
    
    /*
	 * Adding Thumbnail basic support
	 */
    add_theme_support( "post-thumbnails" );

    add_image_size( 'slide', 640, 480, true );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'understrap_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Set up the Wordpress Theme logo feature.
	add_theme_support('custom-logo');
}
endif; // understrap_setup
add_action( 'after_setup_theme', 'understrap_setup' );

/**
* Adding the Read more link to excerpts
*/
/*function new_excerpt_more( $more ) {
	return ' <p><a class="read-more btn btn-default" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'understrap') . '</a></p>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );*/
/* Removes the ... from the excerpt read more link */
function custom_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

/* Adds a custom read more link to all excerpts, manually or automatically generated */

function all_excerpts_get_more_link($post_excerpt) {

    return $post_excerpt . ' [...]<p><a class="btn btn-secondary understrap-read-more-link" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More...', 'understrap')  . '</a></p>';
}
add_filter('wp_trim_excerpt', 'all_excerpts_get_more_link');

// Works cpt

function works_init() {
    register_post_type( 'work', array(
        'labels'            => array(
            'name'                => __( 'Работы', '' ),
            'singular_name'       => __( 'Работа', '' ),
            'all_items'           => __( 'Все работы', '' ),
            'new_item'            => __( 'Новая работа', '' ),
            'add_new'             => __( 'Добавить', '' ),
            'add_new_item'        => __( 'Добавить работу', '' ),
            'edit_item'           => __( 'Edit', '' ),
            'view_item'           => __( 'View', '' ),
            'search_items'        => __( 'Search', '' ),
            'not_found'           => __( 'Not found', '' ),
            'not_found_in_trash'  => __( 'Not found in trash', '' ),
            'parent_item_colon'   => __( 'Parent', '' ),
            'menu_name'           => __( 'Работы', '' ),
        ),
        'public'            => true,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'       => true,
        'taxonomies'        => array('works_cats'),
        'rewrite'           => true,
        'query_var'         => true,
        'publicly_queryable' => true,
        'menu_icon'         => 'dashicons-admin-post',
        'show_in_rest'      => true,
        'rest_base'         => 'work',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    ) );

    flush_rewrite_rules();

}
add_action( 'init', 'works_init' );

// Register Custom Taxonomy
function works_cats_init() {

    $labels = array(
        'name'                       => 'Категории работ',
        'singular_name'              => 'Категория работ',
        'menu_name'                  => 'Категории работ',
        'all_items'                  => 'All Items',
        'parent_item'                => 'Parent Item',
        'parent_item_colon'          => 'Parent Item:',
        'new_item_name'              => 'New Item Name',
        'add_new_item'               => 'Add New Item',
        'edit_item'                  => 'Edit Item',
        'update_item'                => 'Update Item',
        'view_item'                  => 'View Item',
        'separate_items_with_commas' => 'Separate items with commas',
        'add_or_remove_items'        => 'Add or remove items',
        'choose_from_most_used'      => 'Choose from the most used',
        'popular_items'              => 'Popular Items',
        'search_items'               => 'Search Items',
        'not_found'                  => 'Not Found',
        'no_terms'                   => 'No items',
        'items_list'                 => 'Items list',
        'items_list_navigation'      => 'Items list navigation',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'works_cats', array( 'work' ), $args );

}
add_action( 'init', 'works_cats_init', 0 );
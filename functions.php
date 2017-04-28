<?php
/**
 * Talent Board functions and definitions
 *
 * @package Talent Board
 */

add_editor_style();

//Cancel user notification
// function wp_new_user_notification() {
//   // your code
// }

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1020; /* pixels */
}

function tb_redirect_admin(){
    if( !defined('DOING_AJAX') && !current_user_can('manage_options') ){
        wp_redirect( home_url() );
        exit();
    }
}
add_action('admin_init','tb_redirect_admin');


if ( ! function_exists( 'talent_board_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function talent_board_setup() {
	/*
	 * Hide admin bar for not non-admin users
	 */
	if( ! current_user_can('manage_options') ){
		add_filter('show_admin_bar', '__return_false');	
	}

	/*
	 * Remove auto p from content
	 */
	remove_filter( 'the_content', 'wpautop' );

	/*
	 * Enable shortcode render for widget text
	 */
	add_filter( 'widget_text', 'do_shortcode', 11);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Talent Board, use a find and replace
	 * to change 'talent-board' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'talent-board', get_template_directory() . '/languages' );

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
	add_theme_support('post-thumbnails', array('post','page', 'news', 'events', 'resource', 'article', 'webinar', 'report'));

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( 
		array(
			'top-menu'    => __( 'Top Menu', 'talent-board' ),
			'main-menu'   => __( 'Main Menu', 'talent-board' ),
			'footer-menu' => __( 'Footer Menu', 'talent-board' ),
	    )
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'talent_board_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add new role
	$result = add_role(
				    'general_member',
				    __( 'General Member' ),
				    array(
				        'read'         => true,  // true allows this capability
				        'edit_posts'   => true,
				        'delete_posts' => false, // Use false to explicitly deny
				    )
				);
	$result = add_role(
				    'directory_members',
				    __( 'Directory Members' ),
				    array(
				        'read'         => true,  // true allows this capability
				        'edit_posts'   => true,
				        'delete_posts' => false, // Use false to explicitly deny
				        'upload_files' => true,
				    )
				);
	$da_role = get_role('directory_members');
	if ( !$da_role->has_cap('upload_files') )
	{
		$da_role->add_cap('upload_files');
	}
	if ( !$da_role->has_cap('edit_pages') )
	{
		$da_role->add_cap('edit_pages');
	}

}
endif; // talent_board_setup
add_action( 'after_setup_theme', 'talent_board_setup' );

/**
 * Add login box in to top menu
 * @param string $items HTML with navigation items
 * @param object $args navigation menu arguments
 * @return string all navigation items HTML
 */
function new_nav_menu_items($items, $args) {
    if($args->theme_location == 'top-menu'){
       $shop_item = '<li class="login dropdown">
						<a href="#" class="dropdown-toggle" id="register" data-toggle="dropdown">Login</a>
						<div class="dropdown-menu" style="width: 270px">
							<form method="post">
								<fieldset class="top_login">
									<div class="form-group">
										<label for="tl_user_name">Username</label>
										<input type="text" name="tl_user_name" id="tl_user_name" />
									</div>
									<div class="form-group">
										<label for="tl_password">Password</label>
										<input type="password" name="tl_password" id="tl_password" />
									</div>
									<div class="form-group">
										<a href="'.site_url().'/wp-login.php?action=lostpassword">Forgot Password?</a>
										<input type="submit" class="btn_sign_in" value="Sign In">
									</div>				

								</fieldset>
							</form>
						</div>
					</li>';
       $items = $items . $shop_item;
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'new_nav_menu_items', 10, 2);

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function talent_board_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'talent-board' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'talent_board_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function talent_board_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.0.0' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '20150317' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.2.0' );
	wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css', array(), '3.0.0' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), '2.1' );
	wp_enqueue_style( 'bootstrap-select', get_template_directory_uri() . '/css/bootstrap-select.css', array(), '2.1' );

	// Load our main stylesheet.
	wp_enqueue_style( 'tb-style', get_stylesheet_uri() );
	wp_enqueue_style( 'tb-res', get_template_directory_uri() . '/responsive.css', array(), '1.0' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Start Conditional polyfills
	$conditional_scripts = array(
	    'html5shiv'           => '//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.js',
	    'html5shiv-printshiv' => '//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv-printshiv.js',
	    'respond'             => '//cdn.jsdelivr.net/respond/1.4.2/respond.min.js'
	);
	foreach ( $conditional_scripts as $handle => $src ) {
	    wp_enqueue_script( $handle, $src, array(), '', false );
	}
	add_filter( 'script_loader_tag', function( $tag, $handle ) use ( $conditional_scripts ) {
	    if ( array_key_exists( $handle, $conditional_scripts ) ) {
	        $tag = "<!--[if lt IE 9]>$tag<![endif]-->";
	    }
	    return $tag;
	}, 10, 2 );
	// End Conditional polyfills
	
	// Scripts
	wp_enqueue_script( 'talent-board-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'talent-board-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '3.0.0', true );
	wp_enqueue_script( 'jquery.flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '2.1', true );
	wp_enqueue_script( 'backstretch', get_template_directory_uri() . '/js/jquery.backstretch.min.js', array(), '2.1', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array(), '1.0.2', true );
	wp_enqueue_script( 'tb-script', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '20150317', true );

	// wp_enqueue_media();
}
add_action( 'wp_enqueue_scripts', 'talent_board_scripts' );


function custom_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

function admin_color_scheme() {
   global $_wp_admin_css_colors;
   $_wp_admin_css_colors = 0;
}
add_action('admin_head', 'admin_color_scheme');

// custom admin login logo
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { 
		background-image: url('.get_bloginfo('template_directory').'/images/logo_bg.png) !important; 
		background-size: 250px auto !important;
		width: 100% !important;
		height: 54px !important; 
		margin: 0 !important;
		padding:0 !important;
	}
	</style>';
}
add_action('login_head', 'custom_login_logo');

/* ====================================================================================
									Custom Post Types
/* ==================================================================================== */

function cptui_register_my_cpts() {

	/* =========== News =========== */
	$labels = array(
		"name"          => "News",
		"singular_name" => "News",
		"menu_name"     => "News",
	);

	$args = array(
		"labels"              => $labels,
		"description"         => "News posts",
		"public"              => true,
		"show_ui"             => true,
		"has_archive"         => true,
		"show_in_menu"        => true,
		"exclude_from_search" => true,
		"capability_type"     => "post",
		"map_meta_cap"        => true,
		"hierarchical"        => false,
		"rewrite"             => array( "slug" => "news", "with_front" => true ),
		"query_var"           => true,
		"supports"            => array( "title", "editor", "thumbnail" ),			
		'taxonomies'          => array( 'region' ),
	);
	register_post_type( "news", $args );

	
	/* =========== Events =========== */
	$labels = array(
		"name"          => "Events",
		"singular_name" => "Event",
		"menu_name"     => "Events",
	);

	$args = array(
		"labels"              => $labels,
		"description"         => "TalentBoard Events",
		"public"              => true,
		"show_ui"             => true,
		"has_archive"         => true,
		"show_in_menu"        => true,
		"menu_icon"			  => 'dashicons-calendar-alt',
		"exclude_from_search" => true,
		"capability_type"     => "post",
		"map_meta_cap"        => true,
		"hierarchical"        => false,
		"rewrite"             => array( "slug" => "events", "with_front" => true ),
		"query_var"           => true,
		"supports"            => array( "title", "editor", "thumbnail" ),			
		'taxonomies'          => array( 'region' ),
	);
	register_post_type( "events", $args );

	/* =========== Research Papers =========== */

	$labels = array(
		"name"          => "Research Papers",
		"singular_name" => "Research Paper",
		"menu_name"     => "Reseach Papers",
	);

	$args = array(
		"labels"              => $labels,
		"description"         => "Research papers",
		"public"              => true,
		"show_ui"             => true,
		"has_archive"         => true,
		"menu_icon"			  => 'dashicons-media-text',
		"show_in_menu"        => true,
		"exclude_from_search" => true,
		"capability_type"     => "post",
		"map_meta_cap"        => true,
		"hierarchical"        => false,
		"rewrite"             => array( "slug" => "resource", "with_front" => true ),
		"query_var"           => true,
		"supports"            => array( "title", "editor", "thumbnail" ),			
		'taxonomies'          => array( 'region' ),
	);
	register_post_type( "resource", $args );


	/* =========== Community Articles =========== */
	$labels = array(
		"name"          => "Community Articles",
		"singular_name" => "Community Article",
		"menu_name"     => "Articles",
	);

	$args = array(
		"labels"              => $labels,
		"description"         => "Community Articles",
		"public"              => true,
		"show_ui"             => true,
		"has_archive"         => true,
		"show_in_menu"        => true,
		"menu_icon"			  => 'dashicons-admin-page',
		"exclude_from_search" => true,
		"capability_type"     => "post",
		"map_meta_cap"        => true,
		"hierarchical"        => false,
		"rewrite"             => array( "slug" => "article", "with_front" => true ),
		"query_var"           => true,
		"supports"            => array( "title", "editor", "thumbnail", "author" ),			
		'taxonomies'          => array( 'region' ),
	);
	register_post_type( "article", $args );


	/* =========== Community Webinars =========== */
	$labels = array(
		"name"          => "Community Webinars",
		"singular_name" => "Community Webinar",
		"menu_name"     => "Webinars",
	);

	$args = array(
		"labels"              => $labels,
		"description"         => "Community Webinars",
		"public"              => true,
		"show_ui"             => true,
		"has_archive"         => true,
		"show_in_menu"        => true,
		"menu_icon"			  => 'dashicons-playlist-video',
		"exclude_from_search" => false,
		"capability_type"     => "post",
		"map_meta_cap"        => true,
		"hierarchical"        => false,
		"rewrite"             => array( "slug" => "webinar", "with_front" => true ),
		"query_var"           => true,
		"supports"            => array( "title", "editor", "thumbnail" ),			
		'taxonomies'          => array( 'region' ),
	);
	register_post_type( "webinar", $args );

	/* =========== Reports =========== */
	$labels = array(
		"name"          => "Reports",
		"singular_name" => "Report",
		"menu_name"     => "Reports",
	);

	$args = array(
		"labels"              => $labels,
		"description"         => "Reports",
		"public"              => true,
		"show_ui"             => true,
		"has_archive"         => true,
		"show_in_menu"        => true,
		"menu_icon"			  => 'dashicons-media-document',
		"exclude_from_search" => false,
		"capability_type"     => "post",
		"map_meta_cap"        => true,
		"hierarchical"        => false,
		"rewrite"             => array( "slug" => "report", "with_front" => true ),
		"query_var"           => true,
		"supports"            => array( "title", "editor", "thumbnail", "sticky-posts" ),
		'taxonomies'          => array( 'region' ),
	);
	register_post_type( "report", $args );

// End of cptui_register_my_cpts()
}
add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_taxes() {

	$labels = array(
		'name'          => 'Region',
		'singular_name' => 'Region',
		'label'         => 'Region',
		'add_new_item'  =>'Add New Region',
		'edit_item'     =>'Edit Region',
		'search_items'  =>'Search Region',
		'popular_items' =>'Popular Region',
		'view_item'     =>'View Region',
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'label'             => 'Region',
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'show_admin_column' => true,
	);
	register_taxonomy( 'region', array( 'post', 'news', 'events', 'resource', 'article', 'webinar', 'report' ), $args );

	$labels = array(
		'name'          => 'Event Type',
		'singular_name' => 'Event Type',
		'label'         => 'Event Type',
		'add_new_item'  =>'Add Event Type',
		'edit_item'     =>'Edit Event Type',
		'search_items'  =>'Search Event Type',
		'popular_items' =>'Popular Event Type',
		'view_item'     =>'View Event Type',
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'label'             => 'Event Type',
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'show_admin_column' => true,
	);
	register_taxonomy( 'event_type', array( 'events' ), $args );

// End cptui_register_my_taxes
}
add_action( 'init', 'cptui_register_my_taxes' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Main menu 
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * User Manager
 */
require get_template_directory() . '/inc/user-manager.php';

/**
 * Custom Options/Meta/Shortcode Framework
 */
require_once get_template_directory() . '/inc/vafpress/bootstrap.php';

/**
 * Include Custom Data Sources (don't remove)
 */
require_once get_template_directory() . '/inc/data_sources.php';

/**
 * Custom functions and helpers
 */
require_once get_template_directory() . '/inc/custom_functions.php';

/**
 * Custom functions and helpers
 */
require_once get_template_directory() . '/inc/BFI_Thumb.php';





/**
 * Load options, metaboxes, and shortcode generator array templates.
 */


/* ====================================================================================
									Theme Options
/* ==================================================================================== */
// options
$tmpl_opt  = get_template_directory() . '/inc/option.php';

/**
 * Create instance of Options
 */
$theme_options = new VP_Option(
		array(
			'is_dev_mode'           => false,                                   // dev mode, default to false
			'option_key'            => 'vpt_option',                           // options key in db, required
			'page_slug'             => 'vpt_option',                           // options page slug, required
			'template'              => $tmpl_opt,                              // template file path or array, required
			'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
			'use_auto_group_naming' => true,                                   // default to true
			'use_util_menu'         => true,                                   // default to true, shows utility menu
			'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
			'layout'                => 'fixed',                                // fluid or fixed, default to fixed
			'page_title'            => __( 'Theme Options', 'talent-board' ),  // page title
			'menu_label'            => __( 'Theme Options', 'talent-board' ),  // menu label
		)
	);

/* ====================================================================================
									Meta Boxes
/* ==================================================================================== */
// Metaboxes
/*
$tmpl_pb   = get_template_directory() . '/inc/metabox/page_builder.php';
$pb = new VP_Metabox($tmpl_pb);
*/
$page_meta   = get_template_directory() . '/inc/metabox/page_meta.php';
$page_mb = new VP_Metabox($page_meta);
/*
$featured_meta_opt = array(
	'id'          => 'tb_post_options',
	'types'       => array('post','page', 'resource', 'article', 'webinar', 'report'),
	'title'       => __('Post Options', 'talent-board'),
	'priority'    => 'high',
	'autosave' 	  => TRUE,
	'template'    => array(
		array(
			'type' => 'checkbox',
			'name' => 'is_featured',
			'items' => array(
				array(
					'value' => 'featured',
					'label' => __('Make Featured', 'talent-board'),
				),
			),
		),
	),
);

$featured_mb = new VP_Metabox($featured_meta_opt);
*/

$event_box = array(
	'id'          => 'event_info',
	'types'       => array('events'),
	'title'       => __('Event Settings', 'talent-board'),
	'priority'    => 'high',
	'autosave' 	  => TRUE,
	'template'    => array(
		array(
		    'type'      => 'group',
		    'repeating' => false,
		    'length'    => 1,
		    'name'      => 'date',
		    'title'     => __('Event Date', 'talent-board'),
		    'fields'    => array(
		        array(
		            'type'        => 'date',
		            'name'        => 'start_date',
		            'label'       => __('Event Start Date', 'talent-board'),
		            'min_date' => 'today',
		            'format' => 'yy-mm-dd',
		            'default' => 'today',
		            'validation' => 'required',
		        ),
		        array(
		            'type'        => 'textbox',
		            'name'        => 'start_time',
		            'label'       => __('Start Time', 'talent-board'),
		        ),
		        array(
		            'type'        => 'date',
		            'name'        => 'end_date',
		            'label'       => __('Event End Date', 'talent-board'),
		            'min_date' => 'today',
		            'format' => 'yy-mm-dd',
		            'default' => 'today',
		            'validation' => 'required',
		        ),
		        array(
		            'type'        => 'textbox',
		            'name'        => 'end_time',
		            'label'       => __('End Time', 'talent-board'),
		        ),
		    ),
		),
		array(
		    'type'      => 'group',
		    'repeating' => false,
		    'length'    => 1,
		    'name'      => 'address',
		    'title'     => __('Address', 'talent-board'),
		    'fields'    => array(
		        array(
		            'type'        => 'textbox',
		            'name'        => 'address1',
		            'label'       => __('Street Address 1', 'talent-board'),
		        ),
		        array(
		            'type'        => 'textbox',
		            'name'        => 'address2',
		            'label'       => __('Street Address 2', 'talent-board'),
		        ),
		        array(
		            'type'        => 'textbox',
		            'name'        => 'city',
		            'label'       => __('City', 'talent-board'),
		        ),
		        array(
		            'type'        => 'textbox',
		            'name'        => 'state',
		            'label'       => __('State', 'talent-board'),
		        ),
		        array(
		            'type'        => 'textbox',
		            'name'        => 'zipcode',
		            'label'       => __('Zip Code', 'talent-board'),
		        ),
		    ),
		),
	),
);

$tbevents = new VP_Metabox($event_box);


/* ====================================================================================
									Shortcode Options
   ==================================================================================== */

// shortocode generators
// $tmpl_sg1  = get_template_directory() . '/inc/shortcode_generator/shortcodes1.php';
$tmpl_sg2  = get_template_directory() . '/inc/shortcode_generator/shortcodes2.php';

/**
 * Create instances of Shortcode Generator
 */
/*$tmpl_sg1 = array(
	'name'           => 'sg_1',                                        // unique name, required
	'template'       => $tmpl_sg1,                                     // template file or array, required
	'modal_title'    => __( 'Vafpress Shortcodes 1', 'talent-board'), // modal title, default to empty string
	'button_title'   => __( 'Vafpress', 'talent-board'),              // button title, default to empty string
	'types'          => array( 'post', 'page' ),                       // at what post types the generator should works, default to post and page
	'included_pages' => array( 'appearance_page_vpt_option' ),         // or to what other admin pages it should appears
);*/
$tmpl_sg2 = array(
	'name'           => 'sg_2',
	'template'       => $tmpl_sg2,
	'modal_title'    => __( 'Talent Board Shortcodes', 'talent-board'),
	'button_title'   => __( 'Vafpress', 'talent-board'),
	'types'          => array( 'post', 'page' ),
	'main_image'     => get_template_directory_uri() . '/images/vp_shortcode_icon.png',
	'sprite_image'   => get_template_directory_uri() . '/images/vp_shortcode_icon_sprite.png',
);

// $sg1 = new VP_ShortcodeGenerator($tmpl_sg1);
$sg2 = new VP_ShortcodeGenerator($tmpl_sg2);


/**
 * Shortcode Functions
 */
require_once get_template_directory() . '/inc/shortcode_functions.php';

function custom_tweet_template( $tweet ) {
	// echo '<pre>';
	// var_dump($tweet);
	// echo'</pre>';

	$date = date("M j Y h:ia", strtotime($tweet->created_at));
	$text = $tweet->text;

	$text = preg_replace( "#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $text );
	$text = preg_replace( "#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $text );
	$text = preg_replace( "/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $text );
	$text = preg_replace( "/#(\w+)/", "<a href=\"http://twitter.com/search?q=%23\\1&src=hash\" target=\"_blank\">#\\1</a>", $text );

	echo '<div class="col-sm-3">
                            <div class="tw_feed_content">
                                <div class="content_desc">
                                    '.$tweet->user->name.' <a href="https://twitter.com/thecandes">@'.$tweet->user->screen_name.'</a>
                                    <p><span style="font-size:15px;">'.$date.'</span>
                                    	<br />
                                    	'.$text.'
                                    </p>
                                </div>
                            </div>
                        </div>
         ';

}
add_action( 'displaytweets_tweet_template', 'custom_tweet_template' );



function ninja_to_email_filter( $setting, $setting_name, $id ) {
	global $ninja_forms_processing;

	// Bail if we aren't filtering the to setting
	if ( 'to' != $setting_name )
		return $setting;

	// Bail if our notification's setting name isn't admin_email
	if ( 'admin_email' !=  Ninja_Forms()->notification( $id )->get_setting( 'name' ) ){
		//return $setting;
	}

	// Get our submitted field value	
	$value = $ninja_forms_processing->get_field_value( 79 );

	if( is_email($value) ){
		return $setting;
	}

	$user_data = get_user_by('slug', $value);

	$setting[] = $user_data->user_email;

	return $setting;
}

add_filter( 'nf_email_notification_process_setting', 'ninja_to_email_filter', 10, 3 );
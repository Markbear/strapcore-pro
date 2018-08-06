<?php
/**
 * Strapcore-Pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Strapcore-Pro
 */

if ( ! function_exists( 'strapcore_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function strapcore_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Strapcore-Pro, use a find and replace
		 * to change 'strapcore-pro' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'strapcore-pro', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Bootstrap', 'strapcore-pro' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'strapcore-pro' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'strapcore_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'strapcore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function strapcore_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'strapcore_content_width', 640 );
}
add_action( 'after_setup_theme', 'strapcore_content_width', 0 );

/**
 * Widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Scripts.
 */
require get_template_directory() . '/inc/scripts.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Site Header Functions
 */
require get_template_directory() . '/inc/header-functions.php';

/**
 * Site Footer Functions
 */
require get_template_directory() . '/inc/footer-functions.php';


/**
 * Breadcrumbs.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Plugin Activation
 */
require get_template_directory() . '/inc/plugins/install-plugins.php';

/**
 * Comment Callback
 */
//require get_template_directory() . '/inc/comment-callback.php';


function strapcore_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment; 
	?>

	<?php if ( $comment->comment_approved == '1' ): ?>
	<li>
		<div class="card">
			<div class="card-body">
				<div class="media">
					<div class="align-self-start mr-3">
						<?php echo get_avatar( $comment ); ?>
					</div>

					<div class="media-body">
						<h4 class="mt-0"><?php comment_author_link() ?></h4>
						<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
						<?php comment_text() ?>
					</div>
				</div>
			</div>
		</div>
	
	<?php endif;
}

/*
function test_action_hooks(){
	echo '<h1>I have been placed here!</h1>';
}
add_action('st_before_header', 'test_action_hooks');
add_action('st_before_content', 'test_action_hooks');
add_action('st_after_content', 'test_action_hooks');
add_action('st_before_index_content', 'test_action_hooks');
add_action('st_after_index_content', 'test_action_hooks');
add_action('st_before_archive_content', 'test_action_hooks');
add_action('st_after_archive_content', 'test_action_hooks');
add_action('st_before_page_content', 'test_action_hooks');
add_action('st_after_page_content', 'test_action_hooks');*/

function strapcore_page_header() { ?>
	<header class="entry-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mt-4">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->
<?php
}
add_action('st_before_content', 'strapcore_page_header');
<?php
/**
 * Theme functions
 *
 * @package    The_Reader
 * @author     Julien Liabeuf <julien@liabeuf.fr>
 * @license    GPL-2.0+
 * @link       https://julienliabeuf.com
 * @copyright  2016 Julien Liabeuf
 * @since      1.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require( 'includes/the-reader-menu-walker.php' );

add_action( 'after_setup_theme', 'the_reader_content_width', 0 );
/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function the_reader_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'the_reader_content_width', 807 );
}

add_action( 'after_setup_theme', 'the_reader_theme_setup' );
/**
 * Theme setup
 *
 * @since 1.0
 * @return void
 */
function the_reader_theme_setup() {

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since 1.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 72,
		'width'       => 72,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 900 ); // Recommended size for post thumbnails is 900x365 px.

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'thereader' ),
	) );

	// Register the sidebar.
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'thereader' ),
		'id'            => 'main',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'thereader' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div><hr class="small">',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

}

add_action( 'wp_enqueue_scripts', 'the_reader_assets' );
/**
 * Register and load theme styles and scripts
 *
 * @since 1.0
 * @return void
 */
function the_reader_assets() {

	// Register styles
	wp_register_style( 'the_reader-prism', get_template_directory_uri() . '/assets/vendors/prism/prism.css', null, '1.0', 'all' );
	wp_register_style( 'the_reader-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', null, '3.2.0', 'all' );
	wp_register_style( 'the_reader-flaticons', get_template_directory_uri() . '/assets/css/flaticon.css', null, '1.0', 'all' );
	wp_register_style( 'the_reader-nprogress', get_template_directory_uri() . '/assets/css/nprogress.css', null, '1.0', 'all' );
	wp_register_style( 'the_reader-mediaelementplayer', get_template_directory_uri() . '/assets/css/mediaelementplayer.css', null, '1.0', 'all' );
	wp_register_style( 'the_reader-style', get_template_directory_uri() . '/style.css', null, '1.0', 'all' );
	wp_register_style( 'the_reader-color', get_template_directory_uri() . '/assets/css/colors/lime.css', null, '1.0', 'all' );
	wp_register_style( 'the_reader-responsive', get_template_directory_uri() . '/assets/css/responsive.css', null, '1.0', 'all' );
	wp_register_style( 'the_reader-gfonts', '//fonts.googleapis.com/css?family=Raleway:400,300,500,600,700', null, '1.0', 'all' );

	// Register Scripts
	wp_register_script( 'the_reader-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.2.0', true );
	wp_register_script( 'the_reader-media', get_template_directory_uri() . '/assets/js/mediaelement-and-player.min.js', array( 'jquery' ), '2.15.1', true );
	wp_register_script( 'the_reader-fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
	wp_register_script( 'the_reader-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery', 'the_reader-media', 'the_reader-fitvids' ), '1.0', true );
	wp_register_script( 'the_reader-prism', get_template_directory_uri() . '/assets/vendors/prism/prism.js', array( 'jquery' ), '1.0', true );

	// Enqueue scripts
	wp_enqueue_script( 'the_reader-bootstrap' );
	wp_enqueue_script( 'the_reader-media' );
	wp_enqueue_script( 'the_reader-fitvids' );
	wp_enqueue_script( 'the_reader-custom' );
	wp_enqueue_script( 'the_reader-prism' );

	// Enqueue styles
	wp_enqueue_style( 'the_reader-bootstrap' );
	wp_enqueue_style( 'the_reader-gfonts' );
	wp_enqueue_style( 'the_reader-flaticons' );
	wp_enqueue_style( 'the_reader-nprogress' );
	wp_enqueue_style( 'the_reader-mediaelementplayer' );
	wp_enqueue_style( 'the_reader-style' );
	wp_enqueue_style( 'the_reader-color' );
	wp_enqueue_style( 'the_reader-responsive' );
	wp_enqueue_style( 'the_reader-prism' );

}

add_filter( 'wp_link_pages_link', 'the_reader_custom_wp_link_pages_link', 10, 2 );
/**
 * Customize wp_link_pages() to output an unordered list instead of a string
 *
 * @since 1.0
 *
 * @param string   $link     A page link
 * @param int      $i        The page number
 *
 * @global int     $numpages Total number of pages for the post
 * @global int     $page     Current post page number
 * @global WP_Post $post     THe current post object
 *
 * @return string
 */
function the_reader_custom_wp_link_pages_link( $link, $i ) {

	global $numpages, $page, $post;

	$li = '<li';

	if ( $i === $page || 0 === $page && 1 === $i ) {
		$link = "<a href='#'>$link</a>";
		$li .= ' class="active"';
	}

	$li .= '>';

	$link = $li . $link . '</li>';

	if ( 1 === $i ) {
		$link = '<li><a href="' . get_permalink( $post->ID ) . '">First page</a></li>' . "\n" . $link;
	}

	if ( $numpages === $i ) {
		$link .= "\n" . '<li><a href="' . get_permalink( $post->ID ) . $numpages . '" class="disabled">Last page</a></li>';
	}

	return $link;

}

/**
 * Display the posts pagination
 *
 * This pagination is entirely customized to fit the theme navigation markup.
 *
 * @since 1.0
 * @return void
 */
function the_reader_posts_pagination() {

	global $wp_query;

	$pages    = (int) $wp_query->max_num_pages;
	$current  = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$elements = array();

	// No pagination required if there is only one page
	if ( $pages < 2 ) {
		return;
	}

	// First of all we add the previous link
	$prev_page  = $current - 1;
	$prev_link  = 0 === $prev_page || 1 === $prev_page ? home_url() : home_url( '/page/' . $prev_page );
	$prev_class = 1 === $current ? 'class="disabled"' : '';
	$elements[] = '<li><a href="' . $prev_link . '" ' . $prev_class . '>Previous</a></li>';

	for ( $i = 1; $i <= $pages; $i ++ ) {

		$li = '<li';

		if ( $i === $current ) {
			$li .= ' class="active"';
		}

		$li .= '>';
		$elements[] = $li . '<a href="' . home_url( '/page/' . $i ) . '">' . $i . '</a></li>';

	}

	// Finally we add the next link
	$next_page  = $current + 1;
	$next_link  = $next_page > $pages ? home_url( '/page/' . $pages ) : home_url( '/page/' . $next_page );
	$next_class = $current === $pages ? 'class="disabled"' : '';
	$elements[] = '<li><a href="' . $next_link . '" ' . $next_class . '>Next</a></li>';

	echo '<ul class="navigate-page">' . implode( "\n", $elements ) . '</ul>';

}

/**
 * Comments template for The Reader theme
 *
 * @since 1.0
 *
 * @param object $comment The comment object
 * @param array  $args    Comments arguments
 * @param int    $depth   Allowed comments depth
 *
 * @return void
 */
function the_reader_comments( $comment, $args, $depth ) { ?>

	<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<div id="div-comment-<?php comment_ID() ?>" class="row">
			<div class="col-sm-4">
				<div class="thumb">
					<?php if ( $args['avatar_size'] != 0 ) {
						echo get_avatar( $comment, $args['avatar_size'], 'mm', false, array( 'class' => 'img-responsive' ) );
					} ?>
				</div>
			</div>
			<div class="col-sm-20">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
					<br/>
				<?php endif; ?>
				<?php comment_text(); ?>
				<p>
					<a href="<?php echo get_comment_author_url(); ?>" class="author"><?php echo get_comment_author(); ?></a>
					<span><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo human_time_diff( strtotime( get_comment_date() ) ); ?> ago</a></span>
					<?php echo preg_replace( '/comment-reply-link/', 'comment-reply-link ' . 'reply', get_comment_reply_link( array_merge( $args, array(
						'add_below' => 'comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
					) ) ), 1 ); ?>
				</p>
			</div>
		</div>
		<hr class="small">

<?php }

/**
 * Remove wp_trim_excerpt from the excerpt in order to generate an improved version
 *
 * @since 1.0
 */
remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );

add_filter( 'get_the_excerpt', 'the_reader_custom_excerpt' );
/**
 * Customize the excerpt
 *
 * This function re-uses the code from wp_trim_excerpt() but does not apply wp_trim_words() which strips all tags.
 *
 * We want the excerpt to be longer than just the default 55 characters, and to display the formatted content.
 *
 * @since 1.0
 *
 * @param string $excerpt The post excerpt
 *
 * @return string
 */
function the_reader_custom_excerpt( $excerpt ) {

	$raw_excerpt = $excerpt;

	if ( '' == $excerpt ) {

		$excerpt = get_the_content( '' );
		$excerpt = strip_shortcodes( $excerpt );
		$excerpt = apply_filters( 'the_content', $excerpt );
		$excerpt = str_replace( ']]>', ']]&gt;', $excerpt );

		// Set the excerpt word count and only break after sentence is complete.
		$excerpt_word_count = 200;
		$excerpt_length     = apply_filters( 'excerpt_length', $excerpt_word_count );
		$tokens             = array();
		$excerptOutput      = '';
		$count              = 0;

		// Divide the string into tokens; HTML tags, or words, followed by any whitespace
		preg_match_all( '/(<[^>]+>|[^<>\s]+)\s*/u', $excerpt, $tokens );

		foreach ( $tokens[0] as $token ) {

			if ( $count >= $excerpt_length && preg_match( '/[\,\;\?\.\!]\s*$/uS', $token ) ) {
				// Limit reached, continue until , ; ? . or ! occur at the end
				$excerptOutput .= trim( $token ) . ' [&hellip;]';
				break;
			}

			// Add words to complete sentence
			$count ++;

			// Append what's left of the token
			$excerptOutput .= $token;
		}

		$excerpt = trim( force_balance_tags( $excerptOutput ) );

		// Add the read more link if the post is longer that the excerpt length.
		if ( $excerpt_length < count( $tokens[0] ) ) {
			$excerpt_more  = ' <a href="' . esc_url( get_permalink() ) . '">' . sprintf( __( 'Continue reading &rarr;', 'thereader' ), get_the_title() ) . '</a>';
			$excerpt .= $excerpt_more;
		}

	}

	return apply_filters( 'wpse_custom_wp_trim_excerpt', $excerpt, $raw_excerpt );

}

add_filter( 'the_content', 'the_reader_code_highlighting' );
/**
 * Ensure that the code contained in <pre> tags is semantically correct
 *
 * HTML5 recommends that code fragments withing <pre> tags should also be wrapped into <code> tags. Prism, the syntax
 * highlighter used in the theme, follows this recommendation and only triggers if the code if compliant.
 *
 * For that reason, we make sure that all <pre> tags also have the proper <code> wrapper.
 *
 * @since 1.0
 *
 * @param string $content Post content
 *
 * @see   https://www.w3.org/TR/html5/text-level-semantics.html#the-code-element
 *
 * @return string
 */
function the_reader_code_highlighting( $content ) {

	if ( empty( $content ) ) {
		return $content;
	}

	// Prepare a default class to be used on the code tag.
	$class_default = apply_filters( 'the_reader_code_highlight_code_tag_class', 'language-none' );

	// Load the content in a DOMDocument object.
	$document = new DOMDocument();

	// Set the encoding to avoid weird characters issue on saving the HTML.
	$document->encoding = 'utf-8';

	// Load the post content while making sure the content is UTF-8.
	$document->loadHTML( utf8_decode( $content ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );

	// Get all the pre elements from the content.
	$pres = $document->getElementsByTagName( 'pre' );

	foreach ( $pres as $key => $pre ) {

		// Get the <pre> class if any.
		$class = $pre->getAttribute( 'class' );

		// Make sure we have a valid class to apply to the code tag.
		if ( empty( $class ) || 'language-' !== substr( $class, 0, 9 ) ) {
			$class = $class_default;
		}

		$origin = $pre->nodeValue;

		if ( false === strpos( $origin, '<code' ) ) {

			// Create a new, empty pre element that will be used to replace the old one (the one without the code block).
			$new_pre = $document->createElement( 'pre', '' );

			// Create a new code element with the original pre's contents.
			$new_code = $document->createElement( 'code', $origin );

			// Create the class attribute to the code tag.
			$attr = $document->createAttribute( 'class' );

			// Set the class name for the code tag.
			$attr->value = $class;

			// Add the attribute to the new code element.
			$new_code->appendChild( $attr );

			// Now we add the code element to the new pre element.
			$new_pre->appendChild( $new_code );

			// Finally, we replace the original pre element by the new, HTML5 compliant one.
			$pre->parentNode->replaceChild( $new_pre, $pre );

		}

	}

	// Time to get the brand new HTML content from the DOMDocument.
	$content = $document->saveHTML();

	return $content;

}
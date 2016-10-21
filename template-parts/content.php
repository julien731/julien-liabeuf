<?php
/**
 * The template for displaying a standard post
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
} ?>

<!-- GENERAL BLOG POST -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-item' ); ?>>
	<header>
		<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part( 'template-parts/post', 'meta' ); ?>
		<?php if ( has_post_thumbnail() ): the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive content', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); endif; ?>
	</header>
	<?php if ( is_home() ) : the_excerpt(); else: the_content(); endif; ?>
</article>

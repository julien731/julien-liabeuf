<?php
/**
 * The template for displaying a single post
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
		<h1 class="title"><?php the_title(); ?></h1>
		<?php get_template_part( 'template-parts/post', 'meta' ); ?>
		<?php if ( has_post_thumbnail() ): the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive content', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); endif; ?>
	</header>
	<?php the_content(); ?>

</article>

<?php
wp_link_pages( array(
	'before'           => '<ul class="navigate-page">',
	'after'            => '</ul>',
	'link_before'      => '',
	'link_after'       => '',
	'pagelink'         => '%',
	'separator'        => "\n",
	'nextpagelink'     => __( 'Next page' ),
	'previouspagelink' => __( 'Previous page' ),
	'next_or_number'   => 'number',
) );
?>

<!-- SOCIAL ICON AND POST TAGS -->
<div class="social-share">
	<div class="row">
		<div class="col-sm-13">
			<p><?php the_tags( '<strong>Tags: </strong>', ' ,' ); ?></p>
		</div>
		<div class="col-sm-11">
			<?php get_template_part( 'template-parts/social', 'share' ); ?>
		</div>
	</div>
</div> <!-- end of .social-share -->

<?php
if ( '' !== get_the_author_meta( 'description' ) ) {
	get_template_part( 'template-parts/biography' );
}
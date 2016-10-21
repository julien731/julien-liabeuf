<?php
/**
 * The template for displaying the post meta
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

<div class="meta-info">
	<img src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) ); ?>" alt="" class="thumb">
	<ul>
		<li><?php the_author_posts_link(); ?></li>
		<li><?php the_date(); ?></li>
		<li><?php the_category( ', ' ); ?></li>
		<li><a href="<?php comments_link(); ?>"><?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?></a></li>
	</ul>
</div>
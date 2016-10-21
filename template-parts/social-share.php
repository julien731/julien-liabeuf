<?php
/**
 * The template for displaying the post share links
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

<div class="social-icons">
	<p><strong>Share This Post:</strong></p>
	<ul>
		<li><a href="<?php echo wp_sanitize_redirect( 'https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() ); ?>" target="_blank"><i class="fa flaticon-circle6"></i></a></li>
		<li><a href="<?php echo wp_sanitize_redirect( sprintf( 'http://twitter.com/share?text=%1$s&url=%2$s', get_the_title(), get_permalink() ) ); ?>" target="_blank"><i class="fa flaticon-twitter4"></i></a></li>
		<li><a href="<?php echo wp_sanitize_redirect( 'https://plus.google.com/share?url=' . get_permalink() ); ?>" target="_blank"><i class="fa flaticon-google7"></i></a></li>
	</ul>
</div>

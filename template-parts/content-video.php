<?php
/**
 * The template for displaying a video post
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

<!-- VIDEO BLOG POST -->
<article class="blog-item">
	<header>
		<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part( 'template-parts/post', 'meta' ); ?>
	</header>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, omnis modi facilis. Quod fugiat deserunt animi cum maiores omnis, explicabo aliquam, ullam voluptatum veniam quo amet distinctio natus architecto quae!</p>

	<div class="video-player">
		<iframe width="560" height="315" src="//www.youtube.com/embed/i0Ri4DBAU1w" frameborder="0" allowfullscreen></iframe>
	</div> <!-- end of .video-player -->

	<em>***Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae vero molestias obcaecati repellendus at.</em>
</article>

<?php
/**
 * The template for displaying an audio post
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

<!-- AUDIO BLOG POST -->
<article class="blog-item">
	<header>
		<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part( 'template-parts/post', 'meta' ); ?>
	</header>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, omnis modi facilis. Quod fugiat deserunt animi cum maiores omnis, explicabo aliquam, ullam voluptatum veniam quo amet distinctio natus architecto quae!</p>

	<div class="audio-player">
		<audio src="media-files/myaudio.mp3" width="100%" class="mejs-player"></audio>
	</div> <!-- end of .audio-player -->

	<em>***Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae vero molestias obcaecati repellendus at.</em>
</article>

<?php
/**
 * The template for displaying a gallery post
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

<!-- IMAGE GALLERY BLOG POST -->
<article class="blog-item">
	<header>
		<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part( 'template-parts/post', 'meta' ); ?>
	</header>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, omnis modi facilis. Quod fugiat deserunt animi cum maiores omnis, explicabo aliquam, ullam voluptatum veniam quo amet distinctio natus architecto quae!</p>

	<div class="html5-image-gallery clearfix">
		<div class="item">
			<img src="images/gallery/1.jpg" alt="">
			<div class="overlay"></div>
		</div>
		<div class="item">
			<img src="images/gallery/2.jpg" alt="">
			<div class="overlay"></div>
		</div>
		<div class="item">
			<img src="images/gallery/3.jpg" alt="">
			<div class="overlay"></div>
		</div>
		<div class="item">
			<img src="images/gallery/4.jpg" alt="">
			<div class="overlay"></div>
		</div>
		<div class="item">
			<img src="images/gallery/5.jpg" alt="">
			<div class="overlay"></div>
		</div>
		<div class="item">
			<img src="images/gallery/6.jpg" alt="">
			<div class="overlay"></div>
		</div>
		<div class="item">
			<img src="images/gallery/7.jpg" alt="">
			<div class="overlay"></div>
		</div>
		<div class="item">
			<img src="images/gallery/8.jpg" alt="">
			<div class="overlay"></div>
		</div>

	</div> <!-- end of .html5-image-gallery -->

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero similique iure earum culpa, commodi, labore cupiditate, maxime blanditiis laborum dignissimos magnam quam fugit tempora enim molestias molestiae aspernatur doloribus odit!</p>
</article>

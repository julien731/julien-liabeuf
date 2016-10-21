<?php
/**
 * The template for displaying the posts
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

get_header(); ?>

	<!-- BODY CONTAINER -->
	<div class="container">
		<div class="row">
			<!-- =========================
				 BLOG SECTION
			============================== -->
			<div class="col-md-18">
				<div class="blog-style-one content-to-load">

					<?php
					if ( have_posts() ):

						while ( have_posts() ): the_post();

							/**
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

							echo '<hr>';

						endwhile;

					else:

						get_template_part( 'template-parts/content', 'none' );

					endif;

					// Display posts pagination
					the_reader_posts_pagination(); ?>


				</div>
			</div>
			<!-- /END BLOG SECTION -->

			<?php get_sidebar(); ?>

		</div>
	</div> <!-- end of .container-fluid -->

<?php get_footer();
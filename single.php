<?php
/**
 * The template for displaying individual posts
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
				<div class="blog-style-one">
					<?php while ( have_posts() ): the_post();

						// Include the single post content template.
						get_template_part( 'template-parts/content', 'single' );

					endwhile;

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

					if ( is_singular( 'attachment' ) ) {
						// Parent post navigation.
						the_post_navigation( array(
							'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
						) );
					} elseif ( is_singular( 'post' ) ) { ?>

						<div class="row">
							<div class="col-md-12 text-left">
								<?php previous_post_link( '<h5>Previous post</h5> <p class="lead">&larr; %link</p>' ); ?>
							</div>
							<div class="col-md-12 text-right">
								<?php next_post_link( '<h5>Next post</h5> <p class="lead">%link &rarr;</p>' ); ?>
							</div>
						</div>

					<?php } ?>

				</div> <!-- end of .blog style one -->
			</div>
			<!-- /END BLOG SECTION -->

			<?php get_sidebar(); ?>

		</div>
	</div> <!-- end of .container -->

<?php get_footer();
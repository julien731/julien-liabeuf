<?php
/**
 * The template for displaying the contact form
 *
 * Template name: Contact
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
					<?php while ( have_posts() ): the_post(); ?>

						<!-- GENERAL BLOG POST -->
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-item' ); ?>>
							<header>
								<h1 class="title"><?php the_title(); ?></h1>
								<?php if ( has_post_thumbnail() ): the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive content', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); endif; ?>
							</header>
							<?php
							the_content();

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

						</article>

					<?php endwhile; ?>

					<section class="comments-area contact-form-wrapper">
						<div class="comment-form">
							<h3 id="reply-title">Get In Touch</h3>
							<form action="https://formspree.io/julien@liabeuf.fr" method="post" class="contact-form" id="contact-form">
								<div class="comment-input">
									<input type="text" name="name" id="name" placeholder="Full Name*" class="form-input" value="" aria-required="true" required>
								</div>
								<div class="comment-input">
									<input type="email" name="_replyto" id="commenter-email" placeholder="Email*" class="form-input" value="" aria-required="true" required>
								</div>
								<div class="comment-input">
									<textarea name="comment" id="commenter-message" rows="8" placeholder="How can I help you?" class="form-input" aria-required="true" required></textarea>
								</div>
								<p class="form-submit">
									<input type="hidden" name="_subject" value="New message from julienliabeuf.com"/>
									<input type="text" name="_gotcha" style="display:none">
									<input name="submit" type="submit" id="submit" class="btn btn-prime btn-mid" value="Send">
								</p>
							</form>
						</div>
					</section>
				</div> <!-- end of .blog style one -->
			</div>
			<!-- /END BLOG SECTION -->

			<?php get_sidebar(); ?>

		</div>
	</div> <!-- end of .container -->

<?php get_footer();

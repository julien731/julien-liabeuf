<?php
/**
 * The template for displaying comments
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

<!-- COMMENTS SECTION -->
<section class="comments-area">

	<?php if ( have_comments() ) :

		$comments_number = get_comments_number();

		echo '<h3>';

		if ( 1 === $comments_number ) {
			/* translators: %s: post title */
			printf( _x( 'One comment on &ldquo;%s&rdquo;', 'comments title', 'thereader' ), get_the_title() );
		} else {
			printf(
			/* translators: 1: number of comments, 2: post title */
				_nx(
					'%1$s comment on &ldquo;%2$s&rdquo;',
					'%1$s comments on &ldquo;%2$s&rdquo;',
					$comments_number,
					'comments title',
					'thereader'
				),
				number_format_i18n( $comments_number ),
				get_the_title()
			);
		}

		echo '</h3>'; ?>

		<div class="comments">

			<?php the_comments_navigation(); ?>

			<hr class="small">

			<ul>
				<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 96,
					'callback' => 'the_reader_comments',
					'max_depth' => 5
				) );
				?>
			</ul><!-- .comment-list -->

			<?php the_comments_navigation(); ?>

		</div> <!-- end of .comments -->
	<?php endif;

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'thereader' ); ?></p>
	<?php endif; ?>

	<!-- COMMENT FORM -->
	<div class="comment-form">

		<?php
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$aria_req  = ( $req ? " aria-required='true'" : '' );

		comment_form( array(
			'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h3>',
			'fields'             => apply_filters( 'the_reader_comment_form_default_fields', array(
				'author' => '<div class="comment-input"><input type="text" name="author" id="commenter-name" placeholder="Full Name*" class="form-input" value="' . esc_attr( $commenter['comment_author'] ) .
				            '" ' . $aria_req . '></div>',
				'email'  => '<div class="comment-input"><input type="email" name="email" id="commenter-email" placeholder="Email' .
				            ( $req ? '*' : '' ) . '" class="form-input" value="' . esc_attr( $commenter['comment_author_email'] ) .
				            '" ' . $aria_req . '></div>',
				'url'    => '<div class="comment-input"><input type="url" name="url" id="url" placeholder="Website" class="form-input" value="' . esc_attr( $commenter['comment_author_url'] ) .
				            '"></div>',
			) ),
			'comment_field'      => '<div class="comment-input"><textarea name="comment" id="commenter-message" rows="8" placeholder="Write your comment here" class="form-input" aria-required="true"></textarea></div>',
			'class_submit'       => 'btn btn-prime btn-mid',
		) );
		?>

	</div> <!-- end of .comment-form -->

</section> <!-- end of .comments-area -->
<hr>
<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mularx
 */

get_header();
?>
<div class="wrapper inner-wrapper page-404">
	<div class="container">
		<main id="primary" class="site-main col-md-12">

			<section class="error-404 not-found">
				<header class="page-header">
					<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mularx' ); ?></h2>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'mularx' ); ?></p>

						<?php 	get_search_form(); ?>
						<div class="col-md-6">
						<?php the_widget( 'WP_Widget_Recent_Posts' );
						?>

					<h2><?php esc_html_e( 'Pages', 'mularx' ); ?></h2>
					<ul>
					<?php wp_list_pages( array( 'title_li' => '' ) ); ?>
					</ul>
					</div>
					<div class="col-md-6">
						<div class="widget widget_categories">
							<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'mularx' ); ?></h2>
							<ul>
								<?php
								wp_list_categories(
									array(
										'orderby'    => 'count',
										'order'      => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'     => 10,
									)
								);
								?>
							</ul>
						</div><!-- .widget -->

						<?php
						/* translators: %1$s: smiley */
						$mularx_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'mularx' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$mularx_archive_content" );

						the_widget( 'WP_Widget_Tag_Cloud' );
						?>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div>
</div>

<?php
get_footer();

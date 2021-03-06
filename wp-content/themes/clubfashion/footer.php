<?php
/**
 * The template for displaying the footer
 *
 * @package ClubFashion
 */

?>

<?php if ( is_active_sidebar( 'contact_sidebar' ) ) : ?>
<section class="sidebar-contact position-relative py-5">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 text-center">
				<?php dynamic_sidebar( 'contact_sidebar' ); ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<footer class="py-4 border-top">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<p class="mb-0">
				<?php esc_html_e( 'Theme by', 'lb' ); ?>
				<?php if ( is_home() && ! is_paged() ) : ?>
					<a href="<?php echo esc_url( __( 'https://www.thewpclub.com', 'clubfashion' ) ); ?>" title="The WP Club" target="_blank">
				<?php endif; ?>
					Lo
				<?php if ( is_home() && ! is_paged() ) : ?>
					</a>
				<?php endif; ?>
				<span class="sep"> | </span> <a href="<?php echo esc_url( __( 'https://laurentbinder.com/', 'clubfashion' ) ); ?>" target="_blank">
					<?php /* translators: %s containing WordPress */ printf( esc_html__( 'Proudly powered by %s', 'lb' ), 'Lo' ); ?></a>
				</p>
			</div>
		</div>
	</div>
</footer>

<div class="back-to-top d-none"></div>

<?php wp_footer(); ?>

</body>
</html>

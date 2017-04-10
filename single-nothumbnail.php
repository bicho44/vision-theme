<?php
<?php
/*
Single Post Template: Sin Thumbnail
Description: Para las noticias que la imagen principal es muy pequeña no pone la imagen principal en la cabecera
*/
?>

get_header(); ?>

	<div id="primary" class="content-area container">
		<div class="row">

		<main id="main" class="site-main col-md-8" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single-nothumb' );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<?php
		get_sidebar();
		?>
</div>
	</div><!-- #primary -->

<?php
get_footer();

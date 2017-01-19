<?php
/**
* The template for the Front Page
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Filmarte
*/

get_header(); ?>

<?php
$opciones_imgd = get_option('opciones_imgd');

$video = $opciones_imgd['imgd_video'][0];
$videolink = $opciones_imgd['imgd_video_link'];

$destacados = $opciones_imgd['imgd_destaca'][0];
$destacadoscant = $opciones_imgd['imgd_desta_cant'][0];

$destanews = $opciones_imgd['imgd_desta_news'][0];
$destanewscant = $opciones_imgd['imgd_desta_news_cant'][0];

$columnas = $opciones_imgd['imgd_columnas'][0];

//echo piklist::pre($opciones_imgd);
//echo piklist::pre($video);
//var_dump($video);


/**
* Secciones Front Page
* 3 columnas
* Paises, noticias y eventos, sponsors
**/

 ?>
 <?php
 while ( have_posts() ) : the_post();
 	the_content();
 endwhile; // End of the loop.
 ?>

 <?php
 if ($video!=0){
	 if ($videolink!='') {
	 global $wp_embed;
	 ?>
	 <div class="video-programa">
		 <?php echo $wp_embed->run_shortcode( '[embed]' . $videolink . '[/embed]' );
		 //echo do_shortcode("[youtube $videolink]");
		 ?>
	 </div>
<?php }
}
?>

<?php if ($destanews!=0) {?>
<?php
	include( locate_template( 'template-parts/content-front/destacados-news.php' ) );
//get_template_part('template-parts/content-front-destacados'); ?>
<?php } ?>

<?php if ( is_active_sidebar( 'front-page-sidebar' ) ) { ?>
<div class="container">
	<div class="row">
    	<?php dynamic_sidebar( 'front-page-sidebar' ); ?>
	</div>
</div>
<?php } ?>

<?php if ($destacados!=0){?>
<?php
	include( locate_template( 'template-parts/content-front/destacados.php' ) );
	//get_template_part('template-parts/content-front-destacados'); ?>
<?php } ?>

<?php if ($columnas!=0){?>
<?php 
	include( locate_template( 'template-parts/content-front/columnas.php' ) );
//get_template_part('template-parts/content-front-columnas'); ?>
<?php } ?>

<?php
get_footer();
?>

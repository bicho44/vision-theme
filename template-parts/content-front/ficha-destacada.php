<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package IMGD porcitions
 */

?>
<div class="thumbnail">
<?php
// Must be inside a loop.
if (has_post_thumbnail()) {?>

    <a href="<?php the_permalink(); ?>">
          <?php  /* @todo Cambiar para que la imagen sea responsive */
            the_post_thumbnail('news-archive', array('class'=>'align-center img-responsive'));
            ?>
    </a>
<?php } ?>

<?php
$notitle = get_post_meta(get_the_ID(), 'imgd_sin_titulo', true);
//echo var_dump($notitle);

if ($notitle !== '0' ) { ?>
    <header class="destacados-caption">
        <?php
        //get_the_terms(get_the_ID());
        ?>
        <h3 class="align-center">
          <a href="<?php the_permalink(); ?>" rel="bookmark">
           <?php shortentext(get_the_title(), 35);?>
         </a>
       </h3>
        <?php
        //the_title(sprintf('<h3 class="align-center"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');
        shortentext(get_the_content(), 60);
        ?>
    </header><!-- .entry-header -->
<?php } ?>
</div><!-- Fin Thumbnail -->
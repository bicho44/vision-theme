<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package IMGD porcitions
 */

?>

<?php
// Must be inside a loop.
if (has_post_thumbnail()) { ?>

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
        //imgd_content(35);
        ?>
    </header><!-- .entry-header -->
<?php } ?>

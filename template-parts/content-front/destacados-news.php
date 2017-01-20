<?php
// Acá seleciono las Páginas que voy a mostrar como destacados en la Home
$args = array('post_type' => array('post', 'page','imgd_programa', 'portfolio_item', 'imgd_productos', 'imgd_casino_shows'),
'meta_key' => 'imgd_home_news',
'meta_value' => '1',
'post_status' => 'publish',
'posts_per_page' => $destanewscant,
'ignore_sticky_posts'=>true
);

$loop = new WP_Query($args);

if ($loop->have_posts()) {?>
<section class="container imgd-destacados-news">
  <div class="row newsfeature">
      <?php
      $x = 0;
      $destacadosnewsID = array();

      while ($loop->have_posts()) : $loop->the_post();
      $destacadosnewsID[] = get_the_ID();
      
  /*
  2 columnas
  1 feature
  3 sub artiuclos
  */
  ?>

  <?php
  if ($x==0) {
  ?>
  <!-- Columna Principal -->
  <div class="news-principal col-md-8 col-sm-12">
    <article id="post-<?php the_ID(); ?>">
      <div class="thumbnail">
        <?php get_template_part('template-parts/content-archive', 'desta-news'); ?>
      </div><!-- End Thumbanil -->
    </article> 
  </div>
  <!-- End Columna Principal -->

    <?php
    if ( $isMobile->isMobile() ) {?>
    <div class="news-principal">
    <?php
    } else {
      ?>
    <!-- Columna Secundaria -->
    <div class="news-principal col-md-4">
    <?php
    }
    ?>
      <?php
      } 
    if ($x>0) {
      ?>
        <article id="post-<?php the_ID(); ?>" <?php if_mobile_get_me_this_class('class="col-sm-4"', true); //post_class('col-md-2 col-sm-4 col-xs-6'); ?>>
          <div class="thumbnail">
            <?php get_template_part('template-parts/content-archive', 'desta-news-gral'); ?>
          </div>
        </article>
    <?php } 
     $x++;
    ?> 
    <?php endwhile; ?>
    </div> <!-- End Columna secundaria -->
  </div> <!-- End row -->
</section>
<?php } ?>
<?php wp_reset_query();
//var_dump($destacadosID);
?>

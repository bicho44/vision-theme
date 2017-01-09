<?php
// Acá seleciono las Páginas que voy a mostrar como destacados en la Home
$args = array('post_type' => array('post', 'page','imgd_programa', 'portfolio_item', 'imgd_productos', 'imgd_casino_shows'),
'meta_key' => 'imgd_home_news',
'meta_value' => '1',
'post_status' => 'publish',
'posts_per_page' => 4,
'ignore_sticky_posts'=>true
);

$loop = new WP_Query($args);

if ($loop->have_posts()) {?>
<section class="container imgd-destacados-news">
  <div class="row">
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
  <div class="col-md-8">
    <div class="newsfeature">
    <article>
    <?php
          get_template_part('template-parts/content-archive', 'desta-news');
          $x++;
          ?>
    </div>
    </article>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-6">
  <?php
  } else {
  ?>
  <!-- Verificar el diseño de articulo -->

    <article id="post-<?php the_ID(); ?>" <?php //post_class('col-md-2 col-sm-4 col-xs-6'); ?>>
      <div class="thumbnail">
        <?php
        get_template_part('template-parts/content-archive', 'desta-news');
        $x++;
        ?>
      </div>
    </article>

  <?php } ?>
  </div>
    <?php endwhile; ?>
  </div>
</section>
<?php } ?>
<?php wp_reset_query();
//var_dump($destacadosID);
?>

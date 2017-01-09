<?php
// Acá seleciono las Páginas que voy a mostrar como destacados en la Home
$args = array('post_type' => array('post', 'page','imgd_programa', 'portfolio_item', 'imgd_productos', 'imgd_casino_shows'),
'meta_key' => 'imgd_home',
'meta_value' => '1',
'post_status' => 'publish',
'posts_per_page' => 6,
'ignore_sticky_posts'=>true
);
$loop = new WP_Query($args);

if ($loop->have_posts()) {?>
  <section class="container imgd-destacados">
    <div class="row">
    <?php
    $x = 0;
    $destacadosID = array();

    while ($loop->have_posts()) : $loop->the_post();
    $destacadosID[] = get_the_ID();
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('col-md-2 col-sm-4 col-xs-6'); ?>>
      <div class="thumbnail">
      <?php
      get_template_part('template-parts/content-archive', 'destacados');
      $x++;
      ?>
    </div>
    </article>
  <?php endwhile; ?>
  </div>
</section>
<?php } ?>
<?php wp_reset_query();
//var_dump($destacadosID);
?>

<?php
/* Noticias Destacadas */

// Acá seleciono las Páginas que voy a mostrar como destacados en la Home
$args = array('post_type' => array('post', 'page','imgd_programa', 'portfolio_item', 'imgd_productos', 'imgd_casino_shows'),
'meta_key' => 'imgd_home',
'meta_value' => '1',
'post_status' => 'publish',
'posts_per_page' => $destacadoscant,
'ignore_sticky_posts'=>true
);

$cant_cols = 12 / $destacadoscant;
$post_class = 'col-md-'.$cant_cols;

$loop = new WP_Query($args);

if ($loop->have_posts()) {?>
  <section class="imgd-destacados">


  <div class="container">
       <h2> Noticias Destacadas</h2>
    <div class="row">
    <?php
    $x = 0;
    $destacadosID = array();

    while ($loop->have_posts()) : $loop->the_post();
    $destacadosID[] = get_the_ID();
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class($post_class.' col-sm-6'); ?>>
      
      <?php
      get_template_part('template-parts/content-front/ficha', 'destacada');
      $x++;
      ?>

    </article> <!-- End article <?php the_ID(); ?> -->
  <?php endwhile; ?>
  </div> <!-- End Row-->
  </div><!-- End Container-->
</section>
<?php } ?>
<?php wp_reset_query();
//var_dump($destacadosID);
?>

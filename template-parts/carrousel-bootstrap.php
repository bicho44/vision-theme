<?php
/*
* Carrousel Bootstrap Format
*/

// <!-- start loop SlideShow -->
//echo '<h2>Bootstrap</h2>';

$active = 0;
while ($loop->have_posts()) : $loop->the_post();
// Verificar si es una propiedad para mostrar en la home
//$front_page = rwmb_meta('imgd_alquiler_home', 'checkbox');


// Verifico que la noticia tenga imágen
if (imgd_has_slideshow_thumbnail()) {

  if (0 === (int)$active) {
    $class = "active item";
    $indiclass = 'class="active"';

  } else {
    $class = "item";
    $indiclass = "";
  }

  $indicator .= '<li data-target="#myCarousel" data-slide-to="'.$active.'" '.$indiclass.'></li>';

  $carrousel .= '<div class="' . $class . '">';

  /* Obtengo el URL de la imagen principal */
  $post_thumbnail_id = imgd_get_slideshow_thumbnail_id(get_the_ID());
  $html = wp_get_attachment_image_src($post_thumbnail_id, 'full-cropped');

  $carrousel .='<a href="' . get_permalink() . '">';
  $carrousel .= '<img src="' . $html[0] . '" alt="' . get_the_title() . '">';
  $carrousel .= '</a>';

  /*$carrousel .='<div class="carousel-caption">';

  $carrousel .='<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
  $carrousel .= '<p class="hidden-xs hidden-sm">' . imgd_content(33) . '</p>';
  $carrousel .='</div>'<!-- end CAPTION-->;*/

  $carrousel .='</div><!-- end item -->';

  $active++;
} else {// end verification of post_thumbnail
  // Poner acá un array de los post que no tienen Post Thumbnail
  /*$noThumb .= 'Titulo'.get_the_title();
  $noThumb .= '<br />ID Imagen'. imgd_get_slideshow_thumbnail_id(get_the_ID());*/
}

endwhile;
// Reset the post data
wp_reset_postdata();

//<!-- end loop SlideShow -->
// var_dump($noThumb);    ?>

<?php if ($carrousel != '') { ?>
  <!-- Carrousel -->
  <!--         <div class="container">-->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php echo $indicator; ?>
    </ol>

    <!-- Carousel items -->
    <div class="carousel-inner" role="listbox">
      <?php echo $carrousel; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <i class="icon-chevron-left" aria-hidden="true"></i>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <i class="icon-chevron-right" aria-hidden="true"></i>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!--         </div>-->
  <!-- end Carrousel -->
  <?php
} //End Check Carrousel
//echo '<h1>'.$nothumb.'</h1>';

?>

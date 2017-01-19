<?php

/**
 * Jquery enqueue
 * @package: IMGD Framework
 */
// jQuery from Google's CDN, fallback to local if not available
add_action('wp_enqueue_scripts', 'load_external_jQuery');

// Deregister jQuery that is included with WordPress
function load_external_jQuery() {
	wp_deregister_script( 'jquery' );

// Check to make sure Google's library is available
	$link = 'http://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js';
	$try_url = @fopen($link,'r');
	if( $try_url !== false ) {
		// If it's available, get it registered
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, null, true);
	} else {
		// Register the local file if CDN fails
		wp_register_script('jquery', get_template_directory_uri().'/assets/js/vendor/jquery.min.js', __FILE__, false, '2.2.4', true);
	}
	// Get it enqueued
	wp_enqueue_script('jquery');
}


/**
 * Enqueue scripts and styles.
 */
function imgdigital_scripts() {

	//Modernizer
	wp_register_script('img_modern', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js', false, null, false);

    // Scripts from Bootstrap
    wp_enqueue_script( 'scripts-ck', get_template_directory_uri() . '/assets/js/script-ck.js', array( 'jquery' ), null, true );

	wp_enqueue_script('img_modern');

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

	wp_enqueue_style( 'imgdigital-style', get_template_directory_uri()."/assets/css/style.css");

}
add_action( 'wp_enqueue_scripts', 'imgdigital_scripts' );


/** Definir el largo de los excerpt */
define('POST_EXCERPT_LENGTH', 55);
/** Enable to load jQuery from the Google CDN */
add_theme_support('jquery-cdn');

/**
* Agregar el Back to Top
*/
add_action( 'wp_footer', 'back_to_top' );
function back_to_top() {
    echo '<a id="totop" href="#" class="btn btn-default btn-xs"><i class="icon-chevron-up"></i> '.__("Subir","imgd").'</a>';
}

/**
 * Agrego el estilo del editor de texto en el Administrador
 */
function imgd_theme_add_editor_styles() {
    add_editor_style( get_template_directory_uri().'/assets/css/admin-editor.css' );
}
add_action( 'admin_init', 'imgd_theme_add_editor_styles' );

function imgd_theme_add_font_editor_styles() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700');//fonts.googleapis.com/css?family=Open:400,700,900'' );
    add_editor_style( $font_url );

    /*$font_url2 = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600' );
    add_editor_style( $font_url2 );*/
}
add_action( 'after_setup_theme', 'imgd_theme_add_font_editor_styles' );


/**
 * Otros elementos para este tema
 *
 * @package: IMGD Framework
 */
require get_template_directory() . '/imgd/imgd_images_sizes.php';
require get_template_directory() . '/imgd/imgd_gallery.php';
require get_template_directory() . '/imgd/imgd_nav.php';
require get_template_directory() . '/imgd/imgd_child_pages.php';
require get_template_directory() . '/imgd/imgd_comment_bootstrap.php';
require get_template_directory() . '/imgd/imgd_link_navigation.php';
//require get_template_directory() . '/inc/meta-box/meta-box.php';// MetaBox functions
//require get_template_directory() . '/imgd/imgd_widgets.php';
//require get_template_directory() . '/imgd/imgd_pagination.php';
//require get_template_directory() . '/inc/imgd/imgd_it_exchange.php';
//require get_template_directory() . '/imgd/imgd_archive_order.php';
//require get_template_directory() . '/imgd/imgd_settings.php';
//require get_template_directory() . '/inc/imgd/imgd_onepage_settings.php'; // Estas opciones estaban pensadas para el theme de onepagescroll


require get_template_directory() . '/imgd/imgd_shortcode.php';



/**
 * Remueve todo lo que esté en el título de los Archivos
 *
 * Simply remove anything that looks like an archive
 * title prefix ("Archive:", "Foo:", "Bar:").
 *
 * @package: IMGD Framework
 */
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('/^\w+: /', '', $title);
});

/*
 * Remueve la palabra categoria
 *
 * @package:
 */
add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {

        $title = single_cat_title( '', false );

    }

    return $title;

});

/*
 * Registro del Menú Social
 */
function imgd_register_menus() {
    register_nav_menu( 'social', __( 'Social', 'imgdigital' ) );
    register_nav_menu( 'secondary', __( 'Secundario', 'imgdigital' ) );
}
add_action( 'init', 'imgd_register_menus' );


/**
 * Agregar el Estilo al admim
 */
function imgd_admin_style() {
    wp_enqueue_style('admin_styles' , get_template_directory_uri().'/assets/css/admin.css');
}
//add_action('admin_head', 'imgd_admin_style');


/*
 * IMGD Credits
 * Muestra los créditos de IMGDigital
 *
 */
function imgd_credits($inicio='',$p = true) {
    $fecha = "";
    If ($inicio != ''){
        $fecha = $inicio. " - ";
    }
    $copy = 'Copyright '.$fecha.date('Y').' - <a href="http://imgdigital.com.ar/">Federico Reinoso</a>';
    if($p){
        echo $copy;
    } else {
        return $copy;
    }
}
add_action('imgdigital_credits', 'imgd_credits');


/**
 * IMGD Custom Post
 *
 * @param $atts array
 * @return string
 *
 * @TODO: Describir la funcion de imgd_custompost()
 */
function imgd_custompost($atts){
    extract( shortcode_atts( array(
        'post_type' => 'portfolio_item',
        'template' => 'thumbnails',
        'limit' => '10',
        'orderby' => 'date',
    ), $atts ) );

    // Creating custom query to fetch the project type custom post.
    $loop = new WP_Query(array('post_type' => $post_type, 'posts_per_page' => $limit, 'orderby' => $orderby));

    if ($loop->have_posts()) {

        $output = '<div class="row">';
        while ($loop->have_posts()) {
            $loop->the_post();


            $output .= '<div class="type-post hentry col-sm-6 col-md-3">';
            $output .= '    <div class="thumbnail">';
            if (has_post_thumbnail(get_the_ID())) {

                $atts = array(
                    'alt'	=> trim(strip_tags( get_the_title() )),
                    'title'	=> trim(strip_tags( get_the_excerpt() )),
                );

            $output .= '       <a href="'.get_permalink().'" title="'.get_the_title().'">';
            $output .=            get_the_post_thumbnail(get_the_ID(),'thumb-archive', $atts);
            $output .= '       </a>';

            } elseif($post_type == "it_exchange_prod") { ?>
                    <p>ID: <?php
                echo get_the_ID();?></p>
                <p>
                <?php
                $data = it_exchange_get_product(get_the_ID());
                //$data_image = $data->hasimage();
                //it_exchange( 'product', 'has-images' )
                echo 'Has Featured: '. $data->has->featured-image;
                ?>
                <br>
                <?php echo 'Featured Image: '.$data->featured-image; ?>
                </p>
                <code><?php var_dump($data->featured-image); ?></code>

            <?php } else {
                $output .= '       <a href="'.get_permalink().'" >';
                $output .=            '<img src="http://lorempixel.com/gray/253/132/abstract/No Thumbnail" alt="No thumbnail">';
                $output .= '       </a>';
            }

            $output .= '       <div class="caption">';
            $output .= '           <h3 class="entry-title">';
            $output .= '              <a href="'.get_permalink().'">'.get_the_title().'</a>';
            $output .= '           </h3>';
            $output .= '           <div class="entry-content">'.get_the_excerpt().'</div>';
            $output .= '       </div><!-- end caption -->';
            $output .= '     </div><!-- end Thumbnail -->';
            $output .= '</div><!-- end col -->';
        }
        $output .= '</div><!-- end row -->';
    } else {
        $output = '<h2>No hay datos para '. $post_type.'</h2>';
    }
    return $output;
}
add_shortcode('imgdpost','imgd_custompost');


/**
 * Thumbnail Extra
 *
 * Description: Devuelve el
 * @param $postID
 * @return string
 */
function thumbnail_extra($postID) {

    $thumb = "http://lorempixel.com/gray/253/132/abstract/0/No Thumbnail";

    if (!$postID) {
        $postID = get_the_ID();
    }

    $files = get_children('post_parent='.$postID.'&post_type=attachment&post_mime_type=image');
      if($files) :
        $keys = array_reverse(array_keys($files));
        $j=0;
        $num = $keys[$j];
        $image = wp_get_attachment_image($num, 'thumbnail', false);
        $imagepieces = explode('"', $image);
        $imagepath = $imagepieces[1];
        $thumb = wp_get_attachment_thumb_url($num);
      endif;

    return $thumb;
}

function shortentext($text, $chars_limit = 18) {
	echo get_shortentext($text, $chars_limit);
}

/**
* Limitar la cantidad de caracteres en el título
*
* @link: http://www.wpbeginner.com/wp-themes/how-to-truncate-wordpress-post-titles-with-php/
*
*/
function get_shortentext($text, $chars_limit = 18) { // Function name ShortenText
  if (!$chars_limit) $chars_limit = 18; // Character length

  $chars_text = strlen($text);
  $text = $text." ";

  $text = trim(strip_tags( $text ));
  $text = preg_replace('`\[[^\]]*\]`', '', $text);

  $text = substr($text,0,$chars_limit);

  $text = substr($text,0,strrpos($text,' '));

  if ($chars_text > $chars_limit)
     { $text = $text."..."; } // Ellipsis
     return $text;
}

/**
 * IMGD Content
 *
 * @param int $limit Limite de palabras
 * @return string $content El contenido reducido de acuendo al límite de palabras
 */
function get_imgd_content($limit=35,$content="") {

    global $post;

    if($content==''){
        $content = get_the_content();
        $content = preg_replace('/<img[^>]+./','', $content);
        $content = explode(' ', $content, $limit);
    } else {
        $content = preg_replace('/<img[^>]+./','', $content);
        $content = explode(' ', $content, $limit);
    }

    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

//    $content = preg_replace('/\[.+\]/', '', $content);
    $content = apply_filters('the_content', $content);
    $content = preg_replace('/\[.+\]/', '', $content);
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}

function imgd_content($limit=35,$content=""){
	echo get_imgd_content($limit,$content);
}

/**
 * IMG Excerpt
 * Limita la cantidad de palabras en el excerpt de acuerdo a una cantidad dada.
 *
 * @param int $limit Límite de palabras
 * @return string El contenido del excerpt limitado por el límite
 */
function imgd_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}

/**
 * Parametros para el BFI Thumb
 *
 * Devuelve los parámetros para croppear las imagenes
 *
 * @param $thumbnail_name
 * @return array con los parametros
 */
function imgd_parametros_thumbnail($thumbnail_name=""){
    // Determinar el tamaño de la imagen del Carrousel
     if ($thumbnail_name=="full-cropped"){
         $params = array(
             'width'    =>  1300,
             'height'   =>  500,
             'crop'     =>  true
         );
     } elseif ($thumbnail_name=="tablet") {
         $params = array(
             'width'    =>  722,
             'height'   =>  280,
             'crop'     =>  true
         );
     } elseif ($thumbnail_name=="phones") {
         $params = array(
             'width'    =>  349,
             'height'   =>  140,
             'crop'     =>  true
         );
     }

    return $params;
}

/**
 * IMGD Thumbnail
 *
 * @param $postID
 * @param string $size
 * @param string $alttext
 * @return string HTML de la imagen
 */
function imgd_thumbnail($postID, $size='full-cropped', $alttext=""){

    /* Obtengo el URL de la imagen principal */
    $post_thumbnail_id = get_post_thumbnail_id($postID);

    /* Array con los datos de la imagen */
    $html = wp_get_attachment_image_src($post_thumbnail_id, $size);

    /* obtengo los parámetros para el resize */
    $params = imgd_parametros_thumbnail($size);

    /* HTML a devolver */
    $imagen = '<img src="' . bfi_thumb( $html[0], $params ) . '" alt="' . $alttext . '">';

    return $imagen;
}

/**
 * CC Mime Types
 * Habilitar la Posibilidad que Wordpress lea y acepte SVG's
 *
 * @param $mimes
 * @return mixed
 */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Get taxonomies terms links.
 *
 * @see get_object_taxonomies()
 * @link: https://developer.wordpress.org/reference/functions/get_the_terms/
 */
function wpdocs_custom_taxonomies_terms_links() {
    // Get post by post ID.
    $post = get_post( $post->ID );

    // Get post type by post.
    $post_type = $post->post_type;

    // Get post type taxonomies.
    $taxonomies = get_object_taxonomies( $post_type, 'objects' );

    $out = array();

    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

        // Get the terms related to post.
        $terms = get_the_terms( $post->ID, $taxonomy_slug );

        if ( ! empty( $terms ) ) {
            $out[] = "<h2>" . $taxonomy->label . "</h2>\n<ul>";
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<li><a href="%1$s">%2$s</a></li>',
                    esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
                    esc_html( $term->name )
                );
            }
            $out[] = "\n</ul>\n";
        }
    }
    return implode( '', $out );
}

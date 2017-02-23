<?php
/*
Title: Listado de Asociados
Description: Lista de Asociados y su contacto
*/

$country = imgd_paises();
?>
<?php echo $before_widget; ?>
 
<?php echo $before_title; ?>
 <a href="#"><?php echo $settings['imgd_titulo_asociados']; ?></a>
<?php echo $after_title; ?>
 <?php 
$blogusers = get_users( array( 
    'role' => 'author'
 ) );
 ?>
  <?php 
/*$blogusers = get_users( array( 
    'role' => 'Administrator'
 ) );*/?>
<?php 
// Array of stdClass objects.
foreach ( $blogusers as $user ) {
    $thumbnail_id = 0;
    $slider_size = array('40','40');
    $metas = get_user_meta( $user->id);?>

    <div class="media">
        <div class="media-left">
        <?php        
        $thumbnail_id =  $metas['imgd_user_picture'][0];
        if($thumbnail_id!=0) {
            $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, $slider_size , true );
            if($thumbnail_url){?>
                <img class="media-object img-circle" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $user->display_name;?>">
            <?php }
        }
        ?>
        </div>
        <div class="media-body">
            <h4 class="media-heading">
                <a href="mailto:.<?php echo $user->user_email;?>"><?php echo esc_html( $user->display_name );?></a>
            </h4>
            <?php echo $metas['imgd_user_state'][0];?>, <strong><?php echo $country[$metas['imgd_user_country'][0]];?></strong>
            <br>
            <?php echo rtrim(implode(',', $metas['imgd_user_phone']), ',');?> - 
            <?php echo rtrim(implode(',', $metas['imgd_user_cel']), ',');?>
        </div>
    </div>

<?php } ?>

<?php echo $after_widget; ?>
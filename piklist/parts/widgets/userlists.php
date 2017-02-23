<?php
/*
Title: Listado de Asociados
Description: Lista de Asociados y su contacto
*/
?>

<?php echo $before_widget; ?>
 
<?php echo $before_title; ?>
 <?php echo $settings['imgd_titulo_asociados']; ?>
<?php echo $after_title; ?>
 <?php 
$blogusers = get_users( array( 
    'role' => 'author'
 ) );?>
<ul>
<?php 
// Array of stdClass objects.
foreach ( $blogusers as $user ) {
	echo '<li>' . esc_html( $user->display_name ) . '</li>';
}
 ?>
</ul>

<?php echo $after_widget; ?>
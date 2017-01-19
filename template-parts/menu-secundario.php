<?php
/**
* The sidebar containing the main widget area.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Turismo_InterOceánico
*/
if (  has_nav_menu( 'secondary' ) || is_active_sidebar( 'sidebar-2' )  ) : ?>
  <aside id="secondary" class="widget-area col-md-3 col-sm-6 col-xs-12" role="complementary">
    <?php if ( has_nav_menu( 'secondary' ) ) : // Check if there's a menu assigned to the 'social' location. ?>
      <?php
      wp_nav_menu(array(
        'menu' => 'secondary',
        'theme_location' => 'secondary',
        'depth' => 1,
        'container' => 'div',
        'container_class' => 'secondary',
        'container_id' => 'secondary',
        'menu_class' => 'list-unstyled',
      )
    );
    ?>
  <?php endif; // End check for menu. ?>

  <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
  <?php endif; ?>

  </aside><!-- #secondary -->
<?php endif; ?>

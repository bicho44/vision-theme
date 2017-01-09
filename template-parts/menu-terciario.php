<?php
/**
* The sidebar containing the main widget area.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Turismo_InterOceánico
*/
if ( is_active_sidebar( 'sidebar-3' )  ) : ?>
  <aside id="terciary" class="widget-area col-md-3" role="complementary">
  <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-3' ); ?>
  <? endif; ?>

  </aside><!-- #secondary -->
<? endif; ?>

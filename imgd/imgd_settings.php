<?php
/**
* Página de Settings para ser usado con Piklist
*
* @package: IMGD Framework
*/

function imgd_plugin_setting_pages($pages)
{
    $pages[] = array(
        'page_title' => __('IMGD Options','imgd')
        ,'menu_title' => __('IMGD Options', 'imgd')
        ,'capability' => 'manage_options'
        ,'menu_slug' => 'opciones_imgd'
        ,'setting' => 'opciones_imgd'
        ,'single_line' => true
        ,'default_tab' => 'Home'
        ,'save_text' => __('Guardar Settings','imgd')
    );

    return $pages;
}
add_filter('piklist_admin_pages', 'imgd_plugin_setting_pages');
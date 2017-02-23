<?php
/*
Title: Foto Usuario
Tab: Datos Extra
Flow: Datos Usuario
Post Type: user
Order: 10

*/


piklist('field', array(
    'type' => 'file'
    ,'field' => 'imgd_user_picture' // Use these field to match WordPress featured images.
    ,'scope' => 'user_meta'
    ,'options' => array(
        'title' => __('Imagen de Usuario', 'imgd')
        ,'button' => __('Imagen de usuario', 'imgd')
    )
));
piklist('field', array(
    'type' => 'datepicker'
    ,'field' => 'date'
    ,'label' => __('Cumpleaños', 'piklist-demo')
    ,'description' => __('Seleccione una fecha de cumpleaños', 'piklist-demo')
    ,'options' => array(
      'dateFormat' => 'd/m/Y'
    )
    ,'attributes' => array(
      'size' => 12
    )
    ,'value' => date('d/m/Y', time() + 604800)
  ));
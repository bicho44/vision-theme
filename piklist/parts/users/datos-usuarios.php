<?php
/*
Title: Datos Usuarios
Order: 10
Tab: Common
Sub Tab: Basic
Flow: User
*/
?>

<?php

  piklist('field', array(
    'type' => 'text'
    ,'field' => 'text'
    ,'label' => __('Direccion', 'imgd')
    ,'help' => __('You can easily add tooltips to your fields with the help parameter.', 'imgd')
    ,'attributes' => array(
      'class' => 'regular-text'
    )
  ));

  piklist('field', array(
    'type' => 'text'
    ,'field' => 'text'
    ,'label' => __('País', 'imgd')
    ,'help' => __('You can easily add tooltips to your fields with the help parameter.', 'imgd')
    ,'attributes' => array(
      'class' => 'regular-text'
    )
  ));

  piklist('field', array(
    'type' => 'textarea'
    ,'field' => 'demo_textarea_large'
    ,'label' => __('Text Area', 'piklist-demo')
    ,'description' => 'class="large-text code" rows="10" columns="50"'
    ,'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
    ,'attributes' => array(
      'rows' => 10
      ,'cols' => 50
      ,'class' => 'large-text'
    )
  ));

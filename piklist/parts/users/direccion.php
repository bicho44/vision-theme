<?php
/*
Title: Direccion
Tab: Datos Extra
Flow: Datos Usuario
Post Type: user
Order: 30
*/

   piklist('field', array(
    'type' => 'group'
    ,'label' => __('Dirección', 'imgd')
    ,'fields' => array(
      array(
        'type' => 'text'
        ,'field' => 'ungrouped_address_1'
        ,'label' => __('Street Address', 'imgd')
        ,'columns' => 12
      )
      ,array(
        'type' => 'text'
        ,'field' => 'ungrouped_city'
        ,'label' => __('City', 'imgd')
        ,'columns' => 5
      )
      ,array(
        'type' => 'text'
        ,'field' => 'ungrouped_state'
        ,'label' => __('Estado / Provincia', 'imgd')
        ,'columns' => 4
        ,'choices' => ''
      )
      
    , array(
    'type' => 'select'
    ,'field' => 'ungrouped_country'
    ,'label' => __('País', 'imgd')
    ,'attributes' => array(
      'class' => 'text'
    )
    ,'value'=>'Argentina'
    ,'choices' => array(
        '' => __('Seleccione un País', 'imgd')
      ) + imgd_paises()
      )
      ,array(
        'type' => 'text'
        ,'field' => 'ungrouped_postal_code'
        ,'label' => __('Postal Code', 'imgd')
        ,'columns' => 3
      )
    )
  ));
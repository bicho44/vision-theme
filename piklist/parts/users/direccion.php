<?php
/*
Title: Direccion Usuario
Tab: Direccion
Flow: Datos Extra
*/

   piklist('field', array(
    'type' => 'group'
    ,'label' => __('Dirección', 'imgd')
    ,'description' => __('An Un-grouped field. Data is saved as individual meta and is searchable.', 'imgd')
    ,'fields' => array(
      array(
        'type' => 'text'
        ,'field' => 'ungrouped_address_1'
        ,'label' => __('Street Address', 'imgd')
        ,'columns' => 12
      )
      ,array(
        'type' => 'text'
        ,'field' => 'ungrouped_address_2'
        ,'label' => __('PO Box, Suite, etc.', 'imgd')
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
        ,'label' => __('State', 'imgd')
        ,'columns' => 4
        ,'choices' => ''
      )
      ,array(
        'type' => 'text'
        ,'field' => 'ungrouped_postal_code'
        ,'label' => __('Postal Code', 'imgd')
        ,'columns' => 3
      )
    )
  ));
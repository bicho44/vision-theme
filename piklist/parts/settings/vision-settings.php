<?php
/*
Title: Vision Options
Setting: opciones_imgd
Tab: Vision Home Page
*/

piklist (
    'field',
    array(
        'type' => 'radio',
        'scope' => 'post_meta',
        'field' => 'imgd_video',
        'label' => __('Mostar Video en la Home Page', 'imgd'),
        'value' => 0,
        'attributes' => array(
            'class' => 'radio'
        ),
        'choices' => array(
            0 => __('No', 'imgd'),
            1 => __('Si', 'imgd')
        ),
        'position' => 'wrap'
    )
);

piklist('field', array(
    'type' => 'text'
,'field' => 'imgd_video_link'
,'description' => __('Insertar el Link de Video a mostrar en la Home', 'imgd')
,'value' => ''
,'label' => __('Video Link', 'imgd')
, 'conditions' => array(
            array(
                'field' => 'imgd_video'
                , 'value' => 1
            )
        )
,'attributes' => array(
        'class' => 'regular-text'
    )
));

piklist (
    'field',
    array(
        'type' => 'radio',
        'scope' => 'post_meta',
        'field' => 'imgd_desta_news',
        'label' => __('News Destacadas en la Home Page', 'imgd'),
        'value' => 0,
        'attributes' => array(
            'class' => 'radio'
        ),
        'choices' => array(
            0 => __('No', 'imgd'),
            1 => __('Si', 'imgd')
        ),
        'position' => 'wrap'
    )
);

piklist('field', array(
    'type' => 'text'
,'field' => 'imgd_desta_news_cant'
,'description' => __('Cuantas Noticias en el Home', 'imgd')
,'value' => '4'
,'label' => __('Cantidad', 'imgd')
, 'conditions' => array(
            array(
                'field' => 'imgd_desta_news'
                , 'value' => 1
            )
        )
,'attributes' => array(
        'class' => 'small-text'
    )
));


piklist (
    'field',
    array(
        'type' => 'radio',
        'scope' => 'post_meta',
        'field' => 'imgd_destaca',
        'label' => __('Mostar Línea de Destacados en la Home Page', 'imgd'),
        'value' => 0,
        'attributes' => array(
            'class' => 'radio'
        ),
        'choices' => array(
            0 => __('No', 'imgd'),
            1 => __('Si', 'imgd')
        ),
        'position' => 'wrap'
    )
);

piklist('field', array(
    'type' => 'text'
,'field' => 'imgd_desta_cant'
,'description' => __('Cuantas Noticias Destacadas', 'imgd')
,'value' => '6'
,'label' => __('Cantidad', 'imgd')
, 'conditions' => array(
            array(
                'field' => 'imgd_destaca'
                , 'value' => 1
            )
        )
,'attributes' => array(
        'class' => 'small-text'
    )
));

piklist (
    'field',
    array(
        'type' => 'radio',
        'scope' => 'post_meta',
        'field' => 'imgd_columnas',
        'label' => __('Mostar Línea de Columnas', 'imgd'),
        'value' => 0,
        'attributes' => array(
            'class' => 'radio'
        ),
        'choices' => array(
            0 => __('No', 'imgd'),
            1 => __('Si', 'imgd')
        ),
        'position' => 'wrap'
    )
);

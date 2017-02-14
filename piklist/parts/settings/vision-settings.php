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

piklist(
    'field', 
    array(
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
    )
);

piklist (
    'field',
    array(
        'type' => 'radio',
        'scope' => 'post_meta',
        'field' => 'imgd_slider',
        'label' => __('Activar Slideshow en Home Page', 'imgd'),
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

$sliders=array();
$sliders['boo']=__('Carousel Bootstrap','imgd');

if(function_exists(revslider)) {
  $sliders['rev']=__('Revolution Slider','imgd');
}
if(function_exists(owlslider)) {
  $sliders['owl']=__('Owl Slider','imgd');
}

piklist (
    'field',
    array(
        'type' => 'radio',
        'scope' => 'post_meta',
        'field' => 'imgd_slider_type',
        'label' => __('Slideshow para el Home Page', 'imgd'),
        'description' => __('Seleccione el tipo de SlideShow que desea utilizar en el SlideShow', 'imgd'),
        'value' => 'boo',
        'attributes' => array(
            'class' => 'radio'
        )
        , 'choices' => $sliders
        , 'position' => 'wrap'
        , 'conditions' => array(
                array(
                    'field' => 'imgd_slider'
                    , 'value' => 1
                )
            )
    )
);

$thumbnail_post_types = array();

$registered_post_types = piklist(
   get_post_types(
     array()
     ,'objects'
   )
   ,array(
     'name'
     ,'label'
   )
  );

foreach ($registered_post_types as $post_type => $value)
{
  if(post_type_supports($post_type, 'thumbnail'))
  {
    $thumbnail_post_types[$post_type] = $value;
  }
}

  piklist('field', array(
    'type' => 'checkbox'
    ,'field' => 'imgd_slider_post'
    ,'label' => __('Post Type Disponibles','imgd')
    ,'choices' => $thumbnail_post_types
    , 'conditions' => array(
            array(
                'field' => 'imgd_slider'
                , 'value' => 1
            )
        )
  ));



  piklist('field', array(
    'type' => 'select'
    ,'field' => 'imgd_slider_size'
    ,'label' => __('Tamaño imagen del Slider', 'imgd')
    ,'choices' =>  get_intermediate_image_names()
    ,'value' => 'thumbnail'
    ,'conditions' => array(
                        array(
                            'field' => 'imgd_slider'
                            , 'value' => 1
                        )
        )
    )
);


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

piklist(
    'field', 
    array(
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
    )
);


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

piklist(
    'field', 
    array(
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
    )
);

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

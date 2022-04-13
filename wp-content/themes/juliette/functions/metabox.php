<?php
if ( !function_exists( 'nova_add_custom_product_metabox') ) :
function nova_add_custom_product_metabox( $meta_boxes ) {
    $prefix = 'juliette_';
    $meta_boxes = array();
    if ( NOVA_WOOCOMMERCE_IS_ACTIVE ) {
    $meta_boxes[] = [
        'title'      => esc_html__( 'Header Image', 'juliette' ),
        'id'         => 'header-image',
        'post_types' => ['product'],
        'context'    => 'normal',
        'priority'   => 'high',
        'fields'     => [
            [
                'type'             => 'image',
                'id'               => $prefix.'product_page_header_image',
                'max_file_uploads' => 1,
            ],
        ],
    ];
  }
  $meta_boxes[] = [
      'title'      => esc_html__( 'For post format QUOTE', 'juliette' ),
      'id'         => 'format_quote',
      'post_types' => ['post'],
      'context'    => 'normal',
      'priority'   => 'high',
      'fields'     => [
          [
              'type' => 'textarea',
              'name' => esc_html__( 'Quote Content', 'juliette' ),
              'id'   => $prefix.'post_quote_content',
          ],
          [
              'type' => 'text',
              'id'   => $prefix . 'post_quote_author',
              'name' => esc_html__( 'Author', 'juliette' ),
          ],
          [
              'type' => 'color',
              'id'   => $prefix . 'post_quote_text_color',
              'name' => esc_html__( 'Text Color', 'juliette' ),
              'std'  => '#000',
          ],
          [
              'type' => 'color',
              'id'   => $prefix . 'post_quote_bg_color',
              'name' => esc_html__( 'Background Color', 'juliette' ),
              'std'  => '#FFF',
          ],
      ],
  ];
  $meta_boxes[] = [
      'title'      => esc_html__( 'For post format VIDEO', 'juliette' ),
      'id'         => 'format_video',
      'post_types' => ['post'],
      'context'    => 'normal',
      'priority'   => 'high',
      'fields'     => [

          [
              'type' => 'text',
              'id'   => $prefix . 'post_video_url',
              'name' => esc_html__( 'Youtube/Vimeo Video Url', 'juliette' ),
          ],
      ],
  ];
  return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'nova_add_custom_product_metabox' );
endif;

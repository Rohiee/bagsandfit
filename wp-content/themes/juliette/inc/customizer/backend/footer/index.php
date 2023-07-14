<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'footer', array(
    'title'          => esc_html__( 'Footer', 'juliette' ),
    'priority'       => 60,
    'capability'     => 'edit_theme_options',
) );


// ============================================
// Controls
// ============================================

$sep_id  = 48536;
$section = 'footer';
$footer_link = sprintf('<a href="%s">%s</a>', add_query_arg(array('post_type' => 'elementor_library', 'elementor_library_type' => 'footer'), admin_url('edit.php')), __('here', 'juliette'));
Kirki::add_field( 'juliette', array(
    'type'        => 'select',
    'settings'    => 'footer_template',
    'label'       => esc_html__( 'Footer Template', 'juliette' ),
    'section'     => 'footer',
    'default'     => 'type-mini',
    'priority'    => 10,
    'choices'     => array(
        'type-mini'     => esc_html__( 'Footer Mini', 'juliette' ),
        'type-builder'     => esc_html__( 'Footer Builder', 'juliette' ),
    ),
) );
Kirki::add_field( 'juliette', array(
    'type'        => 'select',
    'settings'    => 'footer_template_builder',
    'label'       => esc_html__( 'Footer Builder Template', 'juliette' ),
    'section'     => 'footer',
    'default'     => 'type-mini',
    'priority'    => 10,
    'choices'     => nova_get_config_footer_layout_opts(),
    'description'        => sprintf( __('You can manage footer layout on %s', 'juliette'), $footer_link ),
    'active_callback'    => array(
        array(
            'setting'  => 'footer_template',
            'operator' => '==',
            'value'    => 'type-builder',
        ),
    ),
) );
Kirki::add_field( 'juliette', array(
    'type'     => 'textarea',
    'settings' => 'footer_text',
    'label'    => esc_html__( 'Copyright Text', 'juliette' ),
    'section'  => $section,
    'default'  => esc_html__( '© 2021 Juliette All rights reserved. Designed by Novaworks', 'juliette' ),
    'priority' => 10,
    'active_callback'    => array(
        array(
            'setting'  => 'footer_template',
            'operator' => '==',
            'value'    => 'type-mini',
        ),
    ),
) );

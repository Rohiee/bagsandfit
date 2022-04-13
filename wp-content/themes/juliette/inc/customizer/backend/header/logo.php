<?php

$sep_id  = 7653;
$section = 'header_logo';

Kirki::add_field( 'juliette', array(
    'type'        => 'image',
    'settings'    => 'header_logo',
    'label'       => esc_html__( 'Logo', 'juliette' ),
    'section'     => $section,
    'default'     => get_template_directory_uri() . '/assets/images/logo.svg',
    'priority'    => 10,

) );

// ---------------------------------------------
Kirki::add_field( 'juliette', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,

) );
// ---------------------------------------------

Kirki::add_field( 'juliette', array(
    'type'        => 'image',
    'settings'    => 'header_logo_light',
    'label'       => esc_html__( 'Logo Light', 'juliette' ),
    'section'     => $section,
    'default'     => get_template_directory_uri() . '/assets/images/logo_light.svg',
    'priority'    => 10,

) );

// ---------------------------------------------
Kirki::add_field( 'juliette', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,

) );
// ---------------------------------------------


Kirki::add_field( 'juliette', array(
    'type'        => 'slider',
    'settings'    => 'header_logo_width',
    'label'       => esc_html__( 'Logo Width', 'juliette' ),
    'section'     => $section,
    'default'     => 162,
    'priority'    => 10,
    'choices'     => array(
        'min'  => 20,
        'max'  => 300,
        'step' => 1
    ),

) );

// ---------------------------------------------
Kirki::add_field( 'juliette', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,

) );
// ---------------------------------------------

Kirki::add_field( 'juliette', array(
    'type'        => 'image',
    'settings'    => 'header_alt_logo',
    'label'       => esc_html__( 'Alternative Logo', 'juliette' ),
    'section'     => $section,
    'default'     => get_template_directory_uri() . '/images/alternative_logo.svg',
    'priority'    => 10,

) );

// ---------------------------------------------

<?php

$sep_id  = 365434;
$section = 'blog_single';

Kirki::add_field( 'juliette', array(
    'type'        => 'toggle',
    'settings'    => 'blog_single_sidebar',
    'label'       => esc_html__( 'Blog Sidebar', 'juliette' ),
    'section'     => $section,
    'default'     => false,
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
    'type'        => 'radio-buttonset',
    'settings'    => 'blog_single_sidebar_position',
    'label'       => esc_html__( 'Sidebar Position', 'juliette' ),
    'section'     => $section,
    'default'     => 'right',
    'priority'    => 10,
    'choices'     => array(
        'left'    => esc_html__( 'Left', 'juliette' ),
        'right'   => esc_html__( 'Right', 'juliette' ),
    ),
    'active_callback'    => array(
        array(
            'setting'  => 'blog_single_sidebar',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );

// ---------------------------------------------
Kirki::add_field( 'juliette', array(
    'type'        => 'separator',
    'settings'    => 'separator_'. $sep_id++,
    'section'     => $section,
    'active_callback'    => array(
        array(
            'setting'  => 'blog_single_sidebar',
            'operator' => '==',
            'value'    => true,
        ),
    ),
) );
// ---------------------------------------------

Kirki::add_field( 'juliette', array(
    'type'        => 'toggle',
    'settings'    => 'blog_single_featured',
    'label'       => esc_html__( 'Display Featured Image', 'juliette' ),
    'section'     => $section,
    'default'     => true,
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
    'type'        => 'toggle',
    'settings'    => 'blog_single_social_share',
    'label'       => esc_html__( 'Display Social Share', 'juliette' ),
    'section'     => $section,
    'default'     => false,
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
    'type'        => 'toggle',
    'settings'    => 'blog_single_author_box',
    'label'       => esc_html__( 'Display Author Box', 'juliette' ),
    'section'     => $section,
    'default'     => false,
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
    'type'        => 'toggle',
    'settings'    => 'blog_single_post_nav',
    'label'       => esc_html__( 'Display Post Navigation', 'juliette' ),
    'section'     => $section,
    'default'     => false,
    'priority'    => 10,
) );

<?php
// ============================================
// Panel
// ============================================

Kirki::add_panel( 'panel_styles', array(
    'title'         => esc_html__( 'Styles', 'juliette' ),
    'priority'      => 40,
) );


// ============================================
// Sections
// ============================================

Kirki::add_section( 'style_global', array(
    'title'          => esc_html__( 'Global', 'juliette' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_styles'
) );

Kirki::add_section( 'style_callout', array(
    'title'          => esc_html__( 'Callout', 'juliette' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_styles'
) );

Kirki::add_section( 'style_topbar', array(
    'title'          => esc_html__( 'Topbar', 'juliette' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_styles'
) );

Kirki::add_section( 'style_header', array(
    'title'          => esc_html__( 'Header', 'juliette' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_styles'
) );

Kirki::add_section( 'style_main_menu', array(
    'title'          => esc_html__( 'Main Menu', 'juliette' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_styles'
) );

Kirki::add_section( 'style_dropdowns', array(
    'title'          => esc_html__( 'Dropdown', 'juliette' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_styles'
) );

Kirki::add_section( 'style_quick_view', array(
    'title'          => esc_html__( 'Quick View', 'juliette' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_styles'
) );

Kirki::add_section( 'style_footer', array(
    'title'          => esc_html__( 'Footer', 'juliette' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_styles'
) );


// ============================================
// Controls
// ============================================

require_once('global.php');
require_once('callout.php');
require_once('topbar.php');
require_once('header.php');
require_once('main_menu.php');
require_once('dropdowns.php');
require_once('quick_view.php');
require_once('footer.php');

<?php

// ============================================
// Panel
// ============================================

// no panel


// ============================================
// Sections
// ============================================

Kirki::add_section( 'social_media', array(
    'title'          => esc_html__( 'Social Media', 'juliette' ),
    'priority'       => 65,
    'capability'     => 'edit_theme_options',
) );


// ============================================
// Controls
// ============================================

$sep_id  = 98795;
$section = 'social_media';

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'facebook_link',
    'label'       => esc_html__( 'Facebook', 'juliette' ),
    'section'     => $section,
    'default'     => '#',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'twitter_link',
    'label'       => esc_html__( 'Twitter', 'juliette' ),
    'section'     => $section,
    'default'     => '#',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'pinterest_link',
    'label'       => esc_html__( 'Pinterest', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'linkedin_link',
    'label'       => esc_html__( 'LinkedIn', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'googleplus_link',
    'label'       => esc_html__( 'Google+', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'rss_link',
    'label'       => esc_html__( 'RSS', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'tumblr_link',
    'label'       => esc_html__( 'Tumblr', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'instagram_link',
    'label'       => esc_html__( 'Instagram', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'youtube_link',
    'label'       => esc_html__( 'Youtube', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'vimeo_link',
    'label'       => esc_html__( 'Vimeo', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'behance_link',
    'label'       => esc_html__( 'Behance', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'dribbble_link',
    'label'       => esc_html__( 'Dribbble', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'flickr_link',
    'label'       => esc_html__( 'Flickr', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'git_link',
    'label'       => esc_html__( 'Git', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'skype_link',
    'label'       => esc_html__( 'Skype', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'weibo_link',
    'label'       => esc_html__( 'Weibo', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'foursquare_link',
    'label'       => esc_html__( 'Foursquare', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'soundcloud_link',
    'label'       => esc_html__( 'Soundcloud', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

Kirki::add_field( 'juliette', array(
    'type'        => 'text',
    'settings'    => 'snapchat_link',
    'label'       => esc_html__( 'Snapchat', 'juliette' ),
    'section'     => $section,
    'default'     => '',
    'priority'    => 10,
) );

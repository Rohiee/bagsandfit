<?php


function juliette_theme_register_required_plugins() {

  $plugins = array(
    'novaworks' => array(
      'name'               => esc_html__('Novaworks','juliette'),
      'slug'               => 'novaworks',
      'source'             => 'http://assets.novaworks.net/plugins/juliette/1.0.4/novaworks.zip',
      'required'           => true,
      'description'        => esc_html__('Extends the functionality of Juliette with theme specific shortcodes and page builder elements.','juliette'),
      'demo_required'      => true,
      'version'            => '1.0.4'
    ),
    'juliette-plugin' => array(
      'name'               => esc_html__('Juliette Package Demo Data','juliette'),
      'slug'               => 'juliette-demo-data',
      'source'             => 'http://assets.novaworks.net/plugins/juliette/juliette-demo-data.zip',
      'required'           => false,
      'description'        => esc_html__('This plugin use only for Novaworks Theme.','juliette'),
      'demo_required'      => true,
      'version'            => '1.0.1'
    ),
    'elementor' => array(
      'name'               => esc_html__('Elementor Page Builder','juliette'),
      'slug'               => 'elementor',
      'required'           => true,
      'description'        => esc_html__('The most advanced frontend drag & drop page builder. Create high-end, pixel perfect websites at record speeds. Any theme, any page, any design.','juliette'),
      'demo_required'      => true
    ),
    'woocommerce' => array(
      'name'               => esc_html__('WooCommerce','juliette'),
      'slug'               => 'woocommerce',
      'required'           => true,
      'description'        => esc_html__('The eCommerce engine','juliette'),
      'demo_required'      => true
    ),
    'kirki' => array(
      'name'               => esc_html__('Kirki','juliette'),
      'slug'               => 'kirki',
      'required'           => true,
      'demo_required'      => true
    ),
    'yith-woocommerce-wishlist' => array(
      'name'               => esc_html__('YITH WooCommerce Wishlist','juliette'),
      'slug'               => 'yith-woocommerce-wishlist',
      'required'           => false,
      'description'        => esc_html__('YITH WooCommerce Wishlist gives your users the possibility to create, fill, manage and share their wishlists allowing you to analyze their interests and needs to improve your marketing strategies.','juliette'),
      'demo_required'      => true
    ),
    'envato-market' => array(
      'name'               => esc_html__('Envato Market','juliette'),
      'slug'               => 'envato-market',
      'source'             => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
      'required'           => false,
      'description'        => esc_html__('Automatically update your Envato theme','juliette'),
      'demo_required'      => true
    ),
    'revslider' => array(
      'name'               => esc_html__('Slider Revolution','juliette'),
      'slug'               => 'revslider',
      'source'				     => 'http://assets.novaworks.net/plugins/revslider.zip',
      'required'           => false,
      'demo_required'      => true
    ),
    'contact-form-7' => array(
      'name'               => esc_html__('Contact Form 7','juliette'),
      'slug'               => 'contact-form-7',
      'required'           => false,
      'description'        => esc_html__('Just another contact form plugin. Simple but flexible.','juliette'),
      'demo_required'      => true
    ),
  );

	$config = array(
	  'id'                => 'juliette',
		'default_path'      => '',
		'parent_slug'       => 'themes.php',
		'menu'              => 'tgmpa-install-plugins',
		'has_notices'       => true,
		'is_automatic'      => true,
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'juliette_theme_register_required_plugins' );

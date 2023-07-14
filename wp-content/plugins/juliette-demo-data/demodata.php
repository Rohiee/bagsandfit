<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

function nova_juliette_get_demo_array($dir_url, $dir_path){

    $demo_items = array(
        'home-01' => array(
            'link'          => 'https://juliette.novaworks.net',
            'title'         => 'Home Demo',
            'data_sample'   => 'women.json',
            'data_product'  => 'furniture.csv',
            'data_widget'   => 'widget.json',
            'data_slider'   => 'main-home.zip',
            'category'      => array(
                'Demo',
	            'Fashion'
            )
        ),
        'home-02' => array(
            'link'          => 'https://juliette.novaworks.net/men-home/?preset=header-default',
            'title'         => 'Men Demo',
            'data_sample'   => 'data.json',
            'data_product'  => 'men.csv',
            'data_widget'   => 'widget.json',
            'data_slider'   => 'men-home.zip',
            'category'      => array(
                'Demo',
              'Fashion'
            )
        ),
        'home-03' => array(
            'link'          => 'https://juliette.novaworks.net/bags-home/?preset=header-default',
            'title'         => 'Bags Demo',
            'data_sample'   => 'data.json',
            'data_product'  => 'bags.csv',
            'data_widget'   => 'widget.json',
            'data_slider'   => 'bags-home.zip',
            'category'      => array(
                'Demo',
              'Fashion'
            )
        ),
        'home-04' => array(
            'link'          => 'https://juliette.novaworks.net/shoes-home/',
            'title'         => 'Shoes Demo',
            'data_sample'   => 'data.json',
            'data_product'  => 'shoes.csv',
            'data_widget'   => 'widget.json',
            'data_slider'   => 'shoes-home.zip',
            'category'      => array(
                'Demo',
              'Fashion'
            )
        ),
        'home-05' => array(
            'link'          => 'https://juliette.novaworks.net/watches-home/',
            'title'         => 'Watches Demo',
            'data_sample'   => 'data.json',
            'data_product'  => 'watches.csv',
            'data_widget'   => 'widget.json',
            'data_slider'   => 'watches-home.zip',
            'category'      => array(
                'Demo',
              'Fashion'
            )
        ),
        'home-06' => array(
            'link'          => 'https://juliette.novaworks.net/cosmetic-home/?preset=header-default',
            'title'         => 'Cosmetic Demo',
            'data_sample'   => 'data.json',
            'data_product'  => 'cosmetics.csv',
            'data_widget'   => 'widget.json',
            'data_slider'   => 'cosmetic-home.zip',
            'category'      => array(
                'Demo',
              'Fashion'
            )
        ),
        'home-07' => array(
            'link'          => 'https://juliette.novaworks.net/home/',
            'title'         => 'Women V1',
            'data_sample'   => 'data.json',
            'data_product'  => 'women.csv',
            'data_widget'   => 'widget.json',
            'data_slider'   => 'home-01.zip',
            'category'      => array(
                'Demo',
              'Fashion'
            )
        ),
        'home-08' => array(
            'link'          => 'https://juliette.novaworks.net/home-02/',
            'title'         => 'Women V2',
            'data_sample'   => 'data.json',
            'data_product'  => 'women.csv',
            'data_widget'   => 'widget.json',
            'data_slider'   => 'home-02.zip',
            'category'      => array(
                'Demo',
              'Fashion'
            )
        ),
        'home-09' => array(
            'link'          => 'https://juliette.novaworks.net/home-03/',
            'title'         => 'Women V3',
            'data_sample'   => 'data.json',
            'data_product'  => 'women.csv',
            'data_widget'   => 'widget.json',
            'data_slider'   => 'home-03.zip',
            'category'      => array(
                'Demo',
              'Fashion'
            )
        ),
        'home-10' => array(
            'link'          => 'https://juliette.novaworks.net/home-04/',
            'title'         => 'Dress Demo v1',
            'data_sample'   => 'data.json',
            'data_product'  => 'dress.csv',
            'data_widget'   => 'widget.json',
            'data_slider'   => 'dress-home-v1',
            'category'      => array(
                'Demo',
              'Fashion'
            )
        ),
        'home-10' => array(
            'link'          => 'https://juliette.novaworks.net/home-05/',
            'title'         => 'Dress Demo v2',
            'data_sample'   => 'data.json',
            'data_product'  => 'dress.csv',
            'data_widget'   => 'widget.json',
            'data_slider'   => 'dress-home-v2',
            'category'      => array(
                'Demo',
              'Fashion'
            )
        )
    );

    $default_image_setting = array(
        'woocommerce_single_image_width' => 1000,
        'woocommerce_thumbnail_image_width' => 600,
        'woocommerce_thumbnail_cropping' => 'custom',
        'woocommerce_thumbnail_cropping_custom_width' => 213,
        'woocommerce_thumbnail_cropping_custom_height' => 278
    );

    $default_menu = array(
        'nova_menu_primary'             => 'All',
        'nova_menu_secondary'           => 'Right Menu',
        'nova_menu_left'                => 'Left Menu',
        'nova_topbar_menu'              => 'Top menu',
    );

    $default_page = array(
        'page_for_posts' 	            => 'Blog',
        'woocommerce_shop_page_id'      => 'Shop',
        'woocommerce_cart_page_id'      => 'Cart',
        'woocommerce_checkout_page_id'  => 'Checkout',
        'woocommerce_myaccount_page_id' => 'My account'
    );

    $slider = $dir_path . 'Slider/';
    $content = $dir_path . 'Content/';
    $product = $dir_path . 'Product/';
    $widget = $dir_path . 'Widget/';
    $setting = $dir_path . 'Setting/';
    $preview = $dir_url;

    $data_return = array();

    foreach ($demo_items as $demo_key => $demo_detail){
	    $value = array();
	    $value['title']             = $demo_detail['title'];
	    $value['category']          = !empty($demo_detail['category']) ? $demo_detail['category'] : array('Demo');
	    $value['demo_preset']       = $demo_key;
	    $value['demo_url']          = $demo_detail['link'];
	    $value['preview']           = !empty($demo_detail['preview']) ? $demo_detail['preview'] : ($preview . $demo_key . '.jpg');
	    $value['content']           = !empty($demo_detail['data_sample']) ? $content . $demo_detail['data_sample'] : $content . 'sample-data.json';
	    $value['option']            = !empty($demo_detail['data_option']) ? $setting . $demo_detail['data_option'] : $setting . 'settings.dat';
	    $value['product']           = !empty($demo_detail['data_product']) ? $product . $demo_detail['data_product'] : $product . 'sample-product.json';
	    $value['widget']            = !empty($demo_detail['data_widget']) ? $widget . $demo_detail['data_widget'] : $widget . 'widget.json';
	    $value['pages']             = array_merge( $default_page, array( 'page_on_front' => $demo_detail['title'] ));
	    $value['menu-locations']    = array_merge( $default_menu, isset($demo_detail['menu-locations']) ? $demo_detail['menu-locations'] : array());
	    $value['other_setting']     = array_merge( $default_image_setting, isset($demo_detail['other_setting']) ? $demo_detail['other_setting'] : array());
	    if(!empty($demo_detail['data_slider'])){
		    $value['slider'] = $slider . $demo_detail['data_slider'];
	    }
	    $data_return[$demo_key] = $value;
    }

    return $data_return;
}

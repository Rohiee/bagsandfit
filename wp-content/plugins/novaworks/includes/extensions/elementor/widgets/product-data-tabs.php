<?php

namespace Novaworks_Element\Widgets;

if (!defined('WPINC')) {
    die;
}


use Novaworks_Element\Controls\Group_Control_Box_Style;

// Elementor Classes
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Modules\DynamicTags\Module as TagsModule;

/**
 * Panels Widget
 */
class Product_Data_Tabs extends NOVA_Widget_Base {

    public function get_name() {
        return 'novaworks-product-data-tabs';
    }

    protected function get_widget_title() {
        return esc_html__( 'Product Data Tabs', 'novaworks');
    }

    public function get_icon() {
        return 'eicon-toggle';
    }

    protected function _register_controls() {

        $css_scheme = apply_filters(
            'NovaworksElement/panels/css-scheme',
            array(
                'panel_item'          => '.nova-panels-info-mn li',
                'panel_item_icon'     => '.nova-panels-info-mn li .panels-list__item-icon',
                'panel_item_title'     => '.nova-panels-info-mn li a'
            )
        );
        $this->start_controls_section(
            'section_panels_item_style',
            array(
                'label'      => esc_html__( 'Panel Item', 'novaworks' ),
                'tab'        => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            )
        );
        $this->add_control(
            'title_color',
            array(
                'label'  => esc_html__( 'Title Color', 'novaworks' ),
                'type'   => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} ' . $css_scheme['panel_item_title'] => 'color: {{VALUE}}',
                ),
            )
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'title_typography',

                'selector' => '{{WRAPPER}} ' . $css_scheme['panel_item_title'],
            )
        );

        $this->add_responsive_control(
            'item_padding',
            array(
                'label'      => esc_html__( 'Padding', 'novaworks' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%', 'em' ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['panel_item'] => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            array(
                'name'        => 'item_border',
                'label'       => esc_html__( 'Border', 'novaworks' ),
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} ' . $css_scheme['panel_item'],
            )
        );
        $this->add_control(
            'item_icon_style',
            array(
                'label'     => esc_html__( 'Icon Style', 'novaworks' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );
        $this->add_responsive_control(
          'icon_size',
          array(
            'label'      => __( 'Icon Size', 'novaworks' ),
            'type'       => Controls_Manager::SLIDER,
            'size_units' => array( 'px', 'em', 'rem' ),
            'range'      => array(
              'px' => array(
                'min' => 1,
                'max' => 100,
              ),
            ),
            'selectors'  => array(
              '{{WRAPPER}} ' . $css_scheme['panel_item_icon'] => 'font-size: {{SIZE}}{{UNIT}};',
            ),
          )
        );

        $this->add_responsive_control(
            'icon_margin',
            array(
                'label'      => esc_html__( 'Margin', 'novaworks' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%', 'em' ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['panel_item_icon'] => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );
        $this->end_controls_section();

    }

    protected function render() {

        $this->__context = 'render';
        if( function_exists('nova_elemetor_custom_info_tab') ){
          nova_elemetor_custom_info_tab();
        }
    }
}

<?php
namespace Novaworks_Element\Widgets;

if (!defined('WPINC')) {
    die;
}

use Novaworks_Element\Controls\Group_Control_Box_Style;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Repeater;


use Elementor\Utils;
use Elementor\Modules\DynamicTags\Module as TagsModule;

/**
 * Image_Comparison Widget
 */
class Image_Comparison extends NOVA_Widget_Base {

    public function get_name() {
        return 'novaworks-image-comparison';
    }

    protected function get_widget_title() {
        return esc_html__( 'Image Comparison', 'novaworks' );
    }

    public function get_icon() {
        return 'nova-elements-icon-29';
    }

    public function get_script_depends() {
        return [
            'novaworks-juxtapose',
            'novaworks-image-comparison-elm'
        ];
    }

    public function get_style_depends() {
        return [
            'novaworks-element-front',
            'novaworks-juxtapose',
            'novaworks-image-comparison-elm'
        ] ;
    }

    protected function _register_controls() {
        $css_scheme = apply_filters(
            'NovaworksElement/image-comparison/css-scheme',
            array(
                'instance'         => '.novaworks-image-comparison__instance',
                'jx_instance'      => '.jx-slider',
                'before_container' => '.jx-left',
                'before_label'     => '.jx-left .jx-label',
                'after_container'  => '.jx-right',
                'after_label'      => '.jx-right .jx-label',
                'handle'           => '.jx-handle',
                'arrow'            => '.novaworks-arrow',
                'dots'             => '.novaworks-slick-dots',
            )
        );

        $this->start_controls_section(
            'section_settings',
            array(
                'label' => esc_html__( 'Settings', 'novaworks' ),
            )
        );

        $this->add_responsive_control(
            'slides_to_show',
            array(
                'label'   => esc_html__( 'Slides to Show', 'novaworks' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '1',
                'options' => novaworks_elementor_tools_get_select_range( 10 ),
            )
        );

        $this->add_control(
            'slides_to_scroll',
            array(
                'label'     => esc_html__( 'Slides to Scroll', 'novaworks' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '1',
                'options'   => novaworks_elementor_tools_get_select_range( 10 ),
                'condition' => array(
                    'slides_to_show!' => '1',
                ),
            )
        );

        $this->add_control(
            'pause_on_hover',
            array(
                'label'        => esc_html__( 'Pause on Hover', 'novaworks' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'novaworks' ),
                'label_off'    => esc_html__( 'No', 'novaworks' ),
                'return_value' => 'true',
                'default'      => '',
            )
        );

        $this->add_control(
            'autoplay',
            array(
                'label'        => esc_html__( 'Autoplay', 'novaworks' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'novaworks' ),
                'label_off'    => esc_html__( 'No', 'novaworks' ),
                'return_value' => 'true',
                'default'      => 'true',
            )
        );

        $this->add_control(
            'autoplay_speed',
            array(
                'label'     => esc_html__( 'Autoplay Speed', 'novaworks' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 5000,
                'condition' => array(
                    'autoplay' => 'true',
                ),
            )
        );

        $this->add_control(
            'infinite',
            array(
                'label'        => esc_html__( 'Infinite Loop', 'novaworks' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'novaworks' ),
                'label_off'    => esc_html__( 'No', 'novaworks' ),
                'return_value' => 'true',
                'default'      => 'true',
            )
        );

        $this->add_control(
            'effect',
            array(
                'label'   => esc_html__( 'Effect', 'novaworks' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'slide',
                'options' => array(
                    'slide' => esc_html__( 'Slide', 'novaworks' ),
                    'fade'  => esc_html__( 'Fade', 'novaworks' ),
                ),
                'condition' => array(
                    'slides_to_show' => '1',
                ),
            )
        );

        $this->add_control(
            'speed',
            array(
                'label'   => esc_html__( 'Animation Speed', 'novaworks' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 500,
            )
        );

        $this->add_control(
            'arrows',
            array(
                'label'        => esc_html__( 'Show Arrows Navigation', 'novaworks' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'novaworks' ),
                'label_off'    => esc_html__( 'No', 'novaworks' ),
                'return_value' => 'true',
                'default'      => 'false',
            )
        );

        $this->add_control(
            'prev_arrow',
            array(
                'label'   => esc_html__( 'Prev Arrow Icon', 'novaworks' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'novaworksicon-left-arrow',
                'options' => novaworks_elementor_tools_get_nextprev_arrows_list('prev'),
                'condition' => array(
                    'arrows' => 'true',
                ),
            )
        );

        $this->add_control(
            'next_arrow',
            array(
                'label'   => esc_html__( 'Next Arrow Icon', 'novaworks' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'novaworksicon-right-arrow',
                'options' => novaworks_elementor_tools_get_nextprev_arrows_list('next'),
                'condition' => array(
                    'arrows' => 'true',
                ),
            )
        );

        $this->add_control(
            'dots',
            array(
                'label'        => esc_html__( 'Show Dots Navigation', 'novaworks' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'novaworks' ),
                'label_off'    => esc_html__( 'No', 'novaworks' ),
                'return_value' => 'true',
                'default'      => 'true',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_items_data',
            array(
                'label' => esc_html__( 'Items', 'novaworks' ),
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_before_label',
            array(
                'label'   => esc_html__( 'Before Label', 'novaworks' ),
                'type'    => Controls_Manager::TEXT,
            )
        );

        $repeater->add_control(
            'item_before_image',
            array(
                'label'   => esc_html__( 'Before Image', 'novaworks' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => array(
                    'active' => true,
                    'categories' => array(
                        TagsModule::POST_META_CATEGORY,
                        TagsModule::IMAGE_CATEGORY,
                    ),
                ),
            )
        );

        $repeater->add_control(
            'item_after_label',
            array(
                'label'   => esc_html__( 'After Label', 'novaworks' ),
                'type'    => Controls_Manager::TEXT,
            )
        );

        $repeater->add_control(
            'item_after_image',
            array(
                'label'   => esc_html__( 'After Image', 'novaworks' ),
                'type'    => Controls_Manager::MEDIA,
                'dynamic' => array(
                    'active' => true,
                    'categories' => array(
                        TagsModule::POST_META_CATEGORY,
                        TagsModule::IMAGE_CATEGORY,
                    ),
                ),
            )
        );

        $this->add_control(
            'item_list',
            array(
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array(
                        'item_before_label' => esc_html__( 'Before', 'novaworks' ),
                        'item_before_image' => array(
                            'url' => Utils::get_placeholder_image_src(),
                        ),
                        'item_after_label' => esc_html__( 'After', 'novaworks' ),
                        'item_after_image' => array(
                            'url' => Utils::get_placeholder_image_src(),
                        ),
                    ),
                    array(
                        'item_before_label' => esc_html__( 'Before', 'novaworks' ),
                        'item_before_image' => array(
                            'url' => Utils::get_placeholder_image_src(),
                        ),
                        'item_after_label' => esc_html__( 'After', 'novaworks' ),
                        'item_after_image' => array(
                            'url' => Utils::get_placeholder_image_src(),
                        ),
                    ),
                ),
                'title_field' => '{{{ item_before_label }}}',
            )
        );

        $this->end_controls_section();

        /**
         * General Style Section
         */
        $this->start_controls_section(
            'section_services_general_style',
            array(
                'label'      => esc_html__( 'General', 'novaworks' ),
                'tab'        => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            )
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            array(
                'name'        => 'container_border',
                'label'       => esc_html__( 'Border', 'novaworks' ),
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'  => '{{WRAPPER}} ' . $css_scheme['instance'],
            )
        );

        $this->add_responsive_control(
            'container_border_radius',
            array(
                'label'      => __( 'Border Radius', 'novaworks' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['instance'] => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'container_padding',
            array(
                'label'      => __( 'Padding', 'novaworks' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['instance'] => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            array(
                'name' => 'container_box_shadow',
                'exclude' => array(
                    'box_shadow_position',
                ),
                'selector' => '{{WRAPPER}} ' . $css_scheme['instance'],
            )
        );

        $this->end_controls_section();

        /**
         * Label Style Section
         */
        $this->start_controls_section(
            'section_image_comparison_label_style',
            array(
                'label'      => esc_html__( 'Label', 'novaworks' ),
                'tab'        => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            )
        );

        $this->start_controls_tabs( 'tabs_label_styles' );

        $this->start_controls_tab(
            'tab_label_before',
            array(
                'label' => esc_html__( 'Before', 'novaworks' ),
            )
        );

        $this->add_control(
            'before_label_color',
            array(
                'label' => esc_html__( 'Color', 'novaworks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} ' . $css_scheme['before_label'] => 'color: {{VALUE}}',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'before_label_typography',

                'selector' => '{{WRAPPER}}  ' . $css_scheme['before_label'],
            )
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            array(
                'name'     => 'before_label_background',
                'selector' => '{{WRAPPER}} ' . $css_scheme['before_label'],
            )
        );

        $this->add_responsive_control(
            'before_label_margin',
            array(
                'label'      => __( 'Margin', 'novaworks' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['before_label'] => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'before_label_padding',
            array(
                'label'      => __( 'Padding', 'novaworks' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['before_label'] => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_control(
            'before_label_horizontal_alignment',
            array(
                'label'   => esc_html__( 'Horizontal Alignment', 'novaworks' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'flex-start',
                'options' => array(
                    'flex-start'    => esc_html__( 'Left', 'novaworks' ),
                    'center'        => esc_html__( 'Center', 'novaworks' ),
                    'flex-end'      => esc_html__( 'Right', 'novaworks' ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}} '. $css_scheme['before_container'] => 'justify-content: {{VALUE}};',
                ),
            )
        );

        $this->add_control(
            'before_label_vertical_alignment',
            array(
                'label'   => esc_html__( 'Vertical Alignment', 'novaworks' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'flex-start',
                'options' => array(
                    'flex-start'    => esc_html__( 'Top', 'novaworks' ),
                    'center'        => esc_html__( 'Center', 'novaworks' ),
                    'flex-end'      => esc_html__( 'Bottom', 'novaworks' ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}} '. $css_scheme['before_container'] => 'align-items: {{VALUE}};',
                ),
            )
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_label_after',
            array(
                'label' => esc_html__( 'After', 'novaworks' ),
            )
        );

        $this->add_control(
            'after_label_color',
            array(
                'label' => esc_html__( 'Color', 'novaworks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} ' . $css_scheme['after_label'] => 'color: {{VALUE}}',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'after_label_typography',

                'selector' => '{{WRAPPER}}  ' . $css_scheme['after_label'],
            )
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            array(
                'name'     => 'after_label_background',
                'selector' => '{{WRAPPER}} ' . $css_scheme['after_label'],
            )
        );

        $this->add_responsive_control(
            'after_label_margin',
            array(
                'label'      => __( 'Margin', 'novaworks' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['after_label'] => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'after_label_padding',
            array(
                'label'      => __( 'Padding', 'novaworks' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['after_label'] => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_control(
            'after_label_horizontal_alignment',
            array(
                'label'   => esc_html__( 'Horizontal Alignment', 'novaworks' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'flex-end',
                'options' => array(
                    'flex-start'    => esc_html__( 'Left', 'novaworks' ),
                    'center'        => esc_html__( 'Center', 'novaworks' ),
                    'flex-end'      => esc_html__( 'Right', 'novaworks' ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}} '. $css_scheme['after_container'] => 'justify-content: {{VALUE}};',
                ),
            )
        );

        $this->add_control(
            'after_label_vertical_alignment',
            array(
                'label'   => esc_html__( 'Vertical Alignment', 'novaworks' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'flex-start',
                'options' => array(
                    'flex-start'    => esc_html__( 'Top', 'novaworks' ),
                    'center'        => esc_html__( 'Center', 'novaworks' ),
                    'flex-end'      => esc_html__( 'Bottom', 'novaworks' ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}} '. $css_scheme['after_container'] => 'align-items: {{VALUE}};',
                ),
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Handle Style Section
         */
        $this->start_controls_section(
            'section_image_comparison_handle_style',
            array(
                'label'      => esc_html__( 'Handle', 'novaworks' ),
                'tab'        => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            )
        );

        $this->add_responsive_control(
            'handle_control_width',
            array(
                'label'      => esc_html__( 'Control Width', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( 'px' ),
                'range'      => array(
                    'px' => array(
                        'min' => 20,
                        'max' => 100,
                    ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['handle']                     => 'width: {{SIZE}}{{UNIT}}; margin-left: calc( {{SIZE}}{{UNIT}} / -2 );',
                    '{{WRAPPER}} ' . $css_scheme['handle'] . ' .jx-control'    => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} ' . $css_scheme['handle'] . ' .jx-controller' => 'width: {{SIZE}}{{UNIT}};',
                )
            )
        );

        $this->add_responsive_control(
            'handle_control_height',
            array(
                'label'      => esc_html__( 'Height', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( 'px' ),
                'range'      => array(
                    'px' => array(
                        'min' => 20,
                        'max' => 100,
                    ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['handle'] . ' .jx-controller' => 'height: {{SIZE}}{{UNIT}};',
                )
            )
        );

        $this->start_controls_tabs( 'tabs_handle_styles' );

        $this->start_controls_tab(
            'tab_handle_normal',
            array(
                'label' => esc_html__( 'Normal', 'novaworks' ),
            )
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            array(
                'name'     => 'handle_control_background',
                'selector' => '{{WRAPPER}} ' . $css_scheme['jx_instance'] . ' .jx-controller',
            )
        );

        $this->add_control(
            'handle_arrow_color',
            array(
                'label' => esc_html__( 'Arrow Color', 'novaworks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} ' . $css_scheme['jx_instance'] . ' .jx-controller i' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            array(
                'name' => 'handle_control_box_shadow',
                'selector' => '{{WRAPPER}} ' . $css_scheme['jx_instance'] . ' .jx-controller',
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_handle_hover',
            array(
                'label' => esc_html__( 'Hover', 'novaworks' ),
            )
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            array(
                'name'     => 'handle_control_background_hover',
                'selector' => '{{WRAPPER}} ' . $css_scheme['jx_instance'] . ':hover .jx-controller',
            )
        );

        $this->add_control(
            'handle_arrow_color_hover',
            array(
                'label' => esc_html__( 'Arrow Color', 'novaworks' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} ' . $css_scheme['jx_instance'] . ':hover .jx-controller i' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            array(
                'name' => 'handle_control_box_shadow_hover',
                'selector' => '{{WRAPPER}} ' . $css_scheme['jx_instance'] . ':hover .jx-controller',
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'handle_divider_margin',
            array(
                'label'      => __( 'Margin', 'novaworks' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['handle'] . ' .jx-controller' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
                'separator' => 'before',
            )
        );

        $this->add_responsive_control(
            'handle_divider_radius',
            array(
                'label'      => __( 'Border Radius', 'novaworks' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['handle'] . ' .jx-controller' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'handle_control_alignment',
            array(
                'label'   => esc_html__( 'Alignment', 'novaworks' ),
                'type'    => Controls_Manager::CHOOSE,
                'default' => 'center',
                'label_block' => false,
                'options' => array(
                    'flex-start' => array(
                        'title' => esc_html__( 'Top', 'novaworks' ),
                        'icon'  => 'eicon-v-align-top',
                    ),
                    'center' => array(
                        'title' => esc_html__( 'Center', 'novaworks' ),
                        'icon'  => 'eicon-v-align-middle',
                    ),
                    'flex-end' => array(
                        'title' => esc_html__( 'Bottom', 'novaworks' ),
                        'icon'  => 'eicon-v-align-bottom',
                    ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['jx_instance'] . ' .jx-controller' => 'align-self: {{VALUE}};',
                ),
            )
        );

        $this->add_control(
            'heading_handle_divider_style',
            array(
                'label'     => esc_html__( 'Handle Divider', 'novaworks' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_responsive_control(
            'handle_divider_width',
            array(
                'label'      => esc_html__( 'Divider Width', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( 'px' ),
                'range'      => array(
                    'px' => array(
                        'min' => 1,
                        'max' => 10,
                    ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['handle'] . ' .jx-control:before' => 'width: {{SIZE}}{{UNIT}}; margin-left: calc( {{SIZE}}{{UNIT}}/-2);',
                )
            )
        );

        $this->add_control(
            'handle_divider_color',
            array(
                'label'   => esc_html__( 'Divider Color', 'novaworks' ),
                'type'    => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} ' . $css_scheme['handle'] . ' .jx-control:before' => 'background-color: {{VALUE}};',
                ),
            )
        );

        $this->add_responsive_control(
            'starting_position',
            array(
                'label'      => esc_html__( 'Divider Starting Position', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( '%' ),
                'range'      => array(
                    '%' => array(
                        'min' => 0,
                        'max' => 100,
                    ),
                ),
                'default' => array(
                    'unit' => '%',
                    'size' => 50,
                ),
                'render_type' => 'template',
            )
        );

        $this->add_control(
            'heading_handle_arrow_style',
            array(
                'label'     => esc_html__( 'Handle Arrow', 'novaworks' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'handle_prev_arrow',
            array(
                'label'       => esc_html__( 'Prev Arrow Icon', 'novaworks' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'novaworksicon-left-arrow',
                'render_type' => 'template',
                'options'     => novaworks_elementor_tools_get_nextprev_arrows_list('prev'),
            )
        );

        $this->add_control(
            'handle_next_arrow',
            array(
                'label'       => esc_html__( 'Next Arrow Icon', 'novaworks' ),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'novaworksicon-right-arrow',
                'render_type' => 'template',
                'options'     => novaworks_elementor_tools_get_nextprev_arrows_list('next'),
            )
        );

        $this->add_responsive_control(
            'handle_arrow_size',
            array(
                'label'      => esc_html__( 'Icon Size', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array(
                    'px', 'em'
                ),
                'range'      => array(
                    'px' => array(
                        'min' => 1,
                        'max' => 100,
                    ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['jx_instance'] . ' .jx-controller i' => 'font-size: {{SIZE}}{{UNIT}}',
                ),
            )
        );

        $this->add_responsive_control(
            'handle_arrow_margin',
            array(
                'label'      => __( 'Margin', 'novaworks' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%' ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['handle'] . ' .jx-controller i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->end_controls_section();

        /*
         * Arrows section
         */
        $this->start_controls_section(
            'section_arrows_style',
            array(
                'label'      => esc_html__( 'Arrows', 'novaworks' ),
                'tab'        => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            )
        );

        $this->start_controls_tabs( 'tabs_arrows_style' );

        $this->start_controls_tab(
            'tab_arrows_normal',
            array(
                'label' => esc_html__( 'Normal', 'novaworks' ),
            )
        );

        $this->add_group_control(
            Group_Control_Box_Style::get_type(),
            array(
                'name'           => 'arrows_style',
                'label'          => esc_html__( 'Arrows Style', 'novaworks' ),
                'selector'       => '{{WRAPPER}} ' . $css_scheme['arrow'],
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_arrows_hover',
            array(
                'label' => esc_html__( 'Hover', 'novaworks' ),
            )
        );

        $this->add_group_control(
            Group_Control_Box_Style::get_type(),
            array(
                'name'           => 'arrows_hover_style',
                'label'          => esc_html__( 'Arrows Style', 'novaworks' ),
                'selector'       => '{{WRAPPER}} ' . $css_scheme['arrow'] . ':hover',
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'prev_arrow_position',
            array(
                'label'     => esc_html__( 'Prev Arrow Position', 'novaworks' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'prev_vert_position',
            array(
                'label'   => esc_html__( 'Vertical Position by', 'novaworks' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => array(
                    'top'    => esc_html__( 'Top', 'novaworks' ),
                    'bottom' => esc_html__( 'Bottom', 'novaworks' ),
                ),
            )
        );

        $this->add_responsive_control(
            'prev_top_position',
            array(
                'label'      => esc_html__( 'Top Indent', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( 'px', '%', 'em' ),
                'range'      => array(
                    'px' => array(
                        'min' => -400,
                        'max' => 400,
                    ),
                    '%' => array(
                        'min' => -100,
                        'max' => 100,
                    ),
                    'em' => array(
                        'min' => -50,
                        'max' => 50,
                    ),
                ),
                'condition' => array(
                    'prev_vert_position' => 'top',
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['arrow'] . '.prev-arrow' => 'top: {{SIZE}}{{UNIT}}; bottom: auto;',
                ),
            )
        );

        $this->add_responsive_control(
            'prev_bottom_position',
            array(
                'label'      => esc_html__( 'Bottom Indent', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( 'px', '%', 'em' ),
                'range'      => array(
                    'px' => array(
                        'min' => -400,
                        'max' => 400,
                    ),
                    '%' => array(
                        'min' => -100,
                        'max' => 100,
                    ),
                    'em' => array(
                        'min' => -50,
                        'max' => 50,
                    ),
                ),
                'condition' => array(
                    'prev_vert_position' => 'bottom',
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['arrow'] . '.prev-arrow' => 'bottom: {{SIZE}}{{UNIT}}; top: auto;',
                ),
            )
        );

        $this->add_control(
            'prev_hor_position',
            array(
                'label'   => esc_html__( 'Horizontal Position by', 'novaworks' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => array(
                    'left'  => esc_html__( 'Left', 'novaworks' ),
                    'right' => esc_html__( 'Right', 'novaworks' ),
                ),
            )
        );

        $this->add_responsive_control(
            'prev_left_position',
            array(
                'label'      => esc_html__( 'Left Indent', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( 'px', '%', 'em' ),
                'range'      => array(
                    'px' => array(
                        'min' => -400,
                        'max' => 400,
                    ),
                    '%' => array(
                        'min' => -100,
                        'max' => 100,
                    ),
                    'em' => array(
                        'min' => -50,
                        'max' => 50,
                    ),
                ),
                'condition' => array(
                    'prev_hor_position' => 'left',
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['arrow'] . '.prev-arrow' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
                ),
            )
        );

        $this->add_responsive_control(
            'prev_right_position',
            array(
                'label'      => esc_html__( 'Right Indent', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( 'px', '%', 'em' ),
                'range'      => array(
                    'px' => array(
                        'min' => -400,
                        'max' => 400,
                    ),
                    '%' => array(
                        'min' => -100,
                        'max' => 100,
                    ),
                    'em' => array(
                        'min' => -50,
                        'max' => 50,
                    ),
                ),
                'condition' => array(
                    'prev_hor_position' => 'right',
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['arrow'] . '.prev-arrow' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
                ),
            )
        );

        $this->add_control(
            'next_arrow_position',
            array(
                'label'     => esc_html__( 'Next Arrow Position', 'novaworks' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            )
        );

        $this->add_control(
            'next_vert_position',
            array(
                'label'   => esc_html__( 'Vertical Position by', 'novaworks' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => array(
                    'top'    => esc_html__( 'Top', 'novaworks' ),
                    'bottom' => esc_html__( 'Bottom', 'novaworks' ),
                ),
            )
        );

        $this->add_responsive_control(
            'next_top_position',
            array(
                'label'      => esc_html__( 'Top Indent', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( 'px', '%', 'em' ),
                'range'      => array(
                    'px' => array(
                        'min' => -400,
                        'max' => 400,
                    ),
                    '%' => array(
                        'min' => -100,
                        'max' => 100,
                    ),
                    'em' => array(
                        'min' => -50,
                        'max' => 50,
                    ),
                ),
                'condition' => array(
                    'next_vert_position' => 'top',
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['arrow'] . '.next-arrow' => 'top: {{SIZE}}{{UNIT}}; bottom: auto;',
                ),
            )
        );

        $this->add_responsive_control(
            'next_bottom_position',
            array(
                'label'      => esc_html__( 'Bottom Indent', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( 'px', '%', 'em' ),
                'range'      => array(
                    'px' => array(
                        'min' => -400,
                        'max' => 400,
                    ),
                    '%' => array(
                        'min' => -100,
                        'max' => 100,
                    ),
                    'em' => array(
                        'min' => -50,
                        'max' => 50,
                    ),
                ),
                'condition' => array(
                    'next_vert_position' => 'bottom',
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['arrow'] . '.next-arrow' => 'bottom: {{SIZE}}{{UNIT}}; top: auto;',
                ),
            )
        );

        $this->add_control(
            'next_hor_position',
            array(
                'label'   => esc_html__( 'Horizontal Position by', 'novaworks' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'right',
                'options' => array(
                    'left'  => esc_html__( 'Left', 'novaworks' ),
                    'right' => esc_html__( 'Right', 'novaworks' ),
                ),
            )
        );

        $this->add_responsive_control(
            'next_left_position',
            array(
                'label'      => esc_html__( 'Left Indent', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( 'px', '%', 'em' ),
                'range'      => array(
                    'px' => array(
                        'min' => -400,
                        'max' => 400,
                    ),
                    '%' => array(
                        'min' => -100,
                        'max' => 100,
                    ),
                    'em' => array(
                        'min' => -50,
                        'max' => 50,
                    ),
                ),
                'condition' => array(
                    'next_hor_position' => 'left',
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['arrow'] . '.next-arrow' => 'left: {{SIZE}}{{UNIT}}; right: auto;',
                ),
            )
        );

        $this->add_responsive_control(
            'next_right_position',
            array(
                'label'      => esc_html__( 'Right Indent', 'novaworks' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array( 'px', '%', 'em' ),
                'range'      => array(
                    'px' => array(
                        'min' => -400,
                        'max' => 400,
                    ),
                    '%' => array(
                        'min' => -100,
                        'max' => 100,
                    ),
                    'em' => array(
                        'min' => -50,
                        'max' => 50,
                    ),
                ),
                'condition' => array(
                    'next_hor_position' => 'right',
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['arrow'] . '.next-arrow' => 'right: {{SIZE}}{{UNIT}}; left: auto;',
                ),
            )
        );

        $this->end_controls_section();

        /*
         * Dots section
         */
        $this->start_controls_section(
            'section_dots_style',
            array(
                'label'      => esc_html__( 'Dots', 'novaworks' ),
                'tab'        => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            )
        );

        $this->start_controls_tabs( 'tabs_dots_style' );

        $this->start_controls_tab(
            'tab_dots_normal',
            array(
                'label' => esc_html__( 'Normal', 'novaworks' ),
            )
        );

        $this->add_group_control(
            Group_Control_Box_Style::get_type(),
            array(
                'name'           => 'dots_style',
                'label'          => esc_html__( 'Dots Style', 'novaworks' ),
                'selector'       => '{{WRAPPER}} ' . $css_scheme['dots'] .' li span',
                'exclude' => array(
                    'box_font_color',
                    'box_font_size',
                ),
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_dots_hover',
            array(
                'label' => esc_html__( 'Hover', 'novaworks' ),
            )
        );

        $this->add_group_control(
            Group_Control_Box_Style::get_type(),
            array(
                'name'           => 'dots_style_hover',
                'label'          => esc_html__( 'Dots Style', 'novaworks' ),
                'selector'       => '{{WRAPPER}} ' . $css_scheme['dots'] . ' li span:hover',
                'exclude' => array(
                    'box_font_color',
                    'box_font_size',
                ),
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_dots_active',
            array(
                'label' => esc_html__( 'Active', 'novaworks' ),
            )
        );

        $this->add_group_control(
            Group_Control_Box_Style::get_type(),
            array(
                'name'           => 'dots_style_active',
                'label'          => esc_html__( 'Dots Style', 'novaworks' ),
                'selector'       => '{{WRAPPER}} ' . $css_scheme['dots'] .' li.slick-active span',
                'exclude' => array(
                    'box_font_color',
                    'box_font_size',
                ),
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'dots_gap',
            array(
                'label' => esc_html__( 'Gap', 'novaworks' ),
                'type' => Controls_Manager::SLIDER,
                'default' => array(
                    'size' => 5,
                    'unit' => 'px',
                ),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 50,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} ' . $css_scheme['dots'] . ' li' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}}',
                ),
                'separator' => 'before',
            )
        );

        $this->add_responsive_control(
            'dots_margin',
            array(
                'label'      => esc_html__( 'Dots Box Margin', 'novaworks' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => array( 'px', '%', 'em' ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['dots'] => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'dots_alignment',
            array(
                'label'   => esc_html__( 'Alignment', 'novaworks' ),
                'type'    => Controls_Manager::CHOOSE,
                'default' => 'center',
                'options' => array(
                    'flex-start' => array(
                        'title' => esc_html__( 'Left', 'novaworks' ),
                        'icon'  => 'eicon-h-align-left',
                    ),
                    'center' => array(
                        'title' => esc_html__( 'Center', 'novaworks' ),
                        'icon'  => 'eicon-h-align-center',
                    ),
                    'flex-end' => array(
                        'title' => esc_html__( 'Right', 'novaworks' ),
                        'icon'  => 'eicon-h-align-right',
                    ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}} ' . $css_scheme['dots'] => 'justify-content: {{VALUE}};',
                ),
            )
        );

        $this->end_controls_section();

    }

    protected function render() {

        $this->__context = 'render';

        $this->__open_wrap();
        include $this->__get_global_template( 'index' );
        $this->__close_wrap();
    }

    /**
     * Generate setting json
     *
     * @return string
     */
    public function generate_setting_json() {
        $settings = $this->get_settings();

        $instance_settings = array(
            'slidesToShow'   => array(
                'desktop' => absint( $settings['slides_to_show'] ),
                'laptop'  => absint( isset($settings['slides_to_show_laptop']) ? $settings['slides_to_show_laptop'] : $settings['slides_to_show'] ),
                'tablet'  => absint( $settings['slides_to_show_tablet'] ),
                'tabletportrait'  => absint( isset($settings['slides_to_show_tabletportrait']) ? $settings['slides_to_show_tabletportrait'] : $settings['slides_to_show_tablet'] ),
                'mobile'  => absint( $settings['slides_to_show_mobile'] ),
            ),
            'autoplaySpeed'  => absint( $settings['autoplay_speed'] ),
            'autoplay'       => filter_var( $settings['autoplay'], FILTER_VALIDATE_BOOLEAN ),
            'infinite'       => filter_var( $settings['infinite'], FILTER_VALIDATE_BOOLEAN ),
            'pauseOnHover'   => filter_var( $settings['pause_on_hover'], FILTER_VALIDATE_BOOLEAN ),
            'speed'          => absint( $settings['speed'] ),
            'arrows'         => filter_var( $settings['arrows'], FILTER_VALIDATE_BOOLEAN ),
            'dots'           => filter_var( $settings['dots'], FILTER_VALIDATE_BOOLEAN ),
            'slidesToScroll' => absint( $settings['slides_to_scroll'] ),
            'prevArrow'      => novaworks_elementor_tools_get_carousel_arrow( [ 'prev-arrow', 'slick-prev' ], [ $settings['prev_arrow'] ] ),
            'nextArrow'      => novaworks_elementor_tools_get_carousel_arrow( [ 'next-arrow', 'slick-next' ], [ $settings['next_arrow'] ] ),
            'rtl' => is_rtl(),
        );

        if ( 'fade' === $settings['effect'] ) {
            $instance_settings['fade'] = true;
        }

        $instance_settings = json_encode( $instance_settings );

        return sprintf( 'data-settings=\'%1$s\'', $instance_settings );
    }

}

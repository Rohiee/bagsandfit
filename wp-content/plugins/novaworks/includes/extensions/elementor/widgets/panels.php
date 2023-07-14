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
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Modules\DynamicTags\Module as TagsModule;

/**
 * Panels Widget
 */
class Panels extends NOVA_Widget_Base {
    public $__processed_item_index = 0;

    public function get_name() {
        return 'novaworks-panels';
    }

    protected function get_widget_title() {
        return esc_html__( 'Panels', 'novaworks');
    }

    public function get_icon() {
        return 'eicon-toggle';
    }
    /**
     * [$item_counter description]
     * @var integer
     */
    public $item_counter = 0;

    protected function _register_controls() {

        $this->start_controls_section(
            'section_panels',
            array(
                'label' => esc_html__( 'Panels', 'novaworks'),
            )
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'item_icon',
            array(
                'label'       => esc_html__( 'Icon', 'novaworks' ),
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon'
            )
        );


        $repeater->add_control(
            'item_title',
            array(
                'label'   => esc_html__( 'Panel Title', 'novaworks'),
                'type'    => Controls_Manager::TEXT,
                'dynamic' => array( 'active' => true ),
            )
        );

        $repeater->add_control(
            'item_text',
            array(
                'label'   => esc_html__( 'Panel Description', 'novaworks'),
                'type'    => Controls_Manager::TEXTAREA,
                'dynamic' => array( 'active' => true ),
            )
        );

        $this->add_control(
            'panels_list',
            array(
                'type'        => Controls_Manager::REPEATER,
                'fields'      => array_values( $repeater->get_controls() ),
                'default'     => array(
                    array(
                        'item_title'  => esc_html__( 'Panel #1', 'novaworks' ),
                    ),
                    array(
                        'item_title'  => esc_html__( 'Panel #2', 'novaworks' ),
                    ),
                ),
                'title_field' => '{{{ item_title }}}',
            )
        );

        $this->end_controls_section();

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
        $panels = $this->get_settings_for_display( 'panels_list' );

        if ( ! $panels || empty( $panels ) ) {
            return false;
        }
        $id_int = substr( $this->get_id_int(), 0, 3 );
        ?>
        <ul class="nova-panels-info-mn">
          <?php
            foreach ( $panels as $index => $item ) {
              $tab_count = $index + 1;
              $title_icon_html = '';
              $panel_key  = "nova_panel_".$id_int.$tab_count;

              if ( ! empty( $item['item_icon'] ) ) {
                  ob_start();
                  Icons_Manager::render_icon( $item['item_icon'], [ 'aria-hidden' => 'true' ] );
                  $icon_html = ob_get_clean();
                  if(!empty($icon_html)){
                      $title_icon_html = sprintf( '<span class="panels-list__item-icon">%1$s</span>', $icon_html );
                  }
              }
              $title_label_html = $item['item_title'];
              echo sprintf(
                  '<li><a data-toggle="%1$s" aria-expanded="false" aria-controls="%1$s">%2$s<span class="panels-list__item-title">%3$s</span></a></li>',
                  $panel_key,
                  $title_icon_html,
                  $title_label_html
              );
            }
          ?>
        </ul>
        <?php
        foreach ( $panels as $index => $item ) {
          $tab_count = $index + 1;
          $panel_key  = "nova_panel_".$id_int.$tab_count;
          $title_label_html = $item['item_title'];
          $content_html = $this->parse_text_editor( $item['item_text'] );;
          echo sprintf(
            '<div class="nova-offcanvas sizeguide-canvas site-canvas-menu off-canvas position-right" id="%1$s" data-off-canvas data-transition="overlap">
            <h2 class="title">%2$s</h2>
            <div class="nova-offcanvas__content nova_box_ps">%3$s</div>
            <button class="close-button" aria-label="Close menu" type="button" data-close>
              <svg class="juliette-close-canvas">
                <use xlink:href="#juliette-close-canvas"></use>
              </svg>
            </button>
          </div>',
          $panel_key,
          $title_label_html,
          $content_html
          );
        }
    }
}

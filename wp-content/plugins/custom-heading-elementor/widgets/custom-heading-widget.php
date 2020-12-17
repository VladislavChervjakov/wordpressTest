<?php

/**
 * CustomHeading class.
 *
 * @category   Class
 * @package    CustomHeading
 * @subpackage WordPress
 * @author     Vlad
 * @since      1.0.0
 * php version 7.3.0
 */



use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if(!defined('ABSPATH')) exit; // Exit if accessed directly

class CustomHeading extends Widget_Base {

    public function get_name()
    {
        return 'heading';
    }

    public function get_title()
    {
        return 'Heading';
    }

    public function get_icon()
    {
        return 'fa fa-header';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => 'Content'
            ]
        );

        $this->add_control(
            'custom_heading',
            [
                'label' => 'Enter text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Some header text',
				'separator' => 'before',
            ]
        );

        $this->add_control(
            'html_tag',
            [
                'label' => 'Choose tag',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h1',
                'options' => [
                    'h1' => 'h1',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6'
                ]
            ]
        );

        $this->add_control(
			'text_align',
			[
				'label' => 'Alignment',
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => 'Left',
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => 'Center',
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => 'Right',
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => 'Styles',
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => 'Title Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .header' => 'color: {{VALUE}}',
				],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .header',
			]
        );
        
        $this->add_control(
			'width',
			[
				'label' => 'Width',
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .header' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
    }

    //php render
    protected function render()
    {   $settings = $this->get_settings_for_display();
        echo 
        ' <'.$settings['html_tag'].' class="header" 
        style="color: '.$settings['title_color'].'; text-align: '.$settings['text_align'].' ">
        '.$settings['custom_heading'].'</'.$settings['html_tag'].'> ';
    }

    // JS Render
    protected function _content_template()
    {
        ?>
        <{{settings.html_tag}} class="header"
         style="color: {{settings.title_color}}; text-align: {{settings.text_align}} ">
         {{settings.custom_heading}}</{{settings.html_tag}}>
        <?php
    }

}
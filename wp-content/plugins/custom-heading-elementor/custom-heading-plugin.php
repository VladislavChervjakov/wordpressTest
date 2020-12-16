<?php

/*
 * Elementor Custom Heading Plugin
 *
 * @package CustomHeading
 *
 * Plugin Name: Custom Heading Plugin
 * Description: Simple Elementor Heading 
 * Version:     1.0.0
 * Author:      Vlad
 * Text Domain: elementor-custom-heading
 */

define( 'CUSTOM_HEADING', __FILE__ );

/**
 * Include the Elementor_Awesomesauce class.
 */
require plugin_dir_path( CUSTOM_HEADING ) . 'custom-heading-elementor.php';
<?php

/**
* @package VerticalSlide
*/

/*
Plugin Name: Responsive Vertical Slider
Plugin URI: https://github.com/emazharulislam/rvs
Description: This is a WordPress plugin, which is crated for a Verticl slider. | Shortcode : [vertical_slide]
Author: Mazharul Islam
Author URI: https://profiles.wordpress.org/emazharulislam/
Version: 1.3
Tested up to: 3.6
License: GPLv2 or later
Text Domain: vertical-slide    
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

defined('ABSPATH') or die( 'Heads up! Emergency Alert' );


if ( ! class_exists('VerticalSlide')) {

class VerticalSlide
{

	function register(){
		add_action('wp_enqueue_scripts', array( $this, 'vertical_slide_plugin_scripts'));
		add_action('init', array($this, 'vertical_slide_post_type'));
	}


//Register Post Type
	function vertical_slide_post_type(){
		$supports	=  array('title', 'author','thumbnail','editor');
		$labels		=  array(
			'name'			=> _x( 'Vertical Slides', 'verticalSlide', 'vertical-slide' ),
			'singular_name'	=> _x( 'Vertical Slide', 'verticalSlide', 'vertical-slide' ),
			'name_admin_bar'=> _x( 'Vertical Slide', 'Add New on Toolbar', 'vertical-slide' ),
        	'add_new'		=> _x( 'Add New Slide', 'vertical-slide' ),
			'add_new_item'	=> __( 'Add New Slide', 'vertical-slide' ),
			'new_item'		=> __( 'New Slide', 'vertical-slide' ),
        	'edit_item'		=> __( 'Edit Slide', 'vertical-slide' ),
        	'view_item'		=> __( 'View Slide', 'vertical-slide' ),
        	'all_items'		=> __( 'All Slides', 'vertical-slide' ),
		
		);

		register_post_type('verticalSlide',  array('public' => true, 'labels' => $labels , 'supports' => $supports, 'menu_icon' => 'dashicons-image-flip-vertical' ));
	}

	function vertical_slide_plugin_scripts() {   

	    //Scripts
	    wp_enqueue_script( 'plvsscript_js', plugin_dir_url( __FILE__ ).'assets/js/plvsscript.js', array( 'jquery' ), '001', true );

	    //Styles 
	    wp_enqueue_style( 'plvsstyles-style', plugins_url('assets/css/plvsstyles.css', __FILE__ ) , array(), '01', 'all' );
	}


  

}  




	
	$verticalSlide = new VerticalSlide();
	$verticalSlide->register();


//Activate
require_once plugin_dir_path(__FILE__). 'inc/verticalslide_activate.php';
register_activation_hook(__FILE__, array( 'VerticalslideActivate', 'activate'));

//Deactivate
require_once plugin_dir_path(__FILE__). 'inc/verticalslide_deactivate.php';
register_deactivation_hook(__FILE__, array('VerticalslideDeactivate', 'deactivate'));

//Short Code
require_once plugin_dir_path(__FILE__). 'inc/verticalslide_shortcode.php'; 

}

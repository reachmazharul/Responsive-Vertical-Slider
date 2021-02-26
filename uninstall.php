<?php

/**
* Plugin uninstall.
* @package VerticalSlide
*
*/

if( !defined('WP_UNINSTALL_PLUGIN')){
	die;
}

 
$verticalSlides = get_posts( array('post_type' => 'verticalSlide', 'numberposts' => -1));

foreach ( $verticalSlides as $verticalSlide ) {

	wp_delete_post( $verticalSlide->ID, true );
}



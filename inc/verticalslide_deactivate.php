<?php

/**
* @package VerticalSlide
*/

 class VerticalslideDeactivate{

 	public static function deactivate(){

 		 
		flush_rewrite_rules();
 		
 	}
 }
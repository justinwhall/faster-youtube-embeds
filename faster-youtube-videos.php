<?php
/*
 * Plugin Name: Faster Youtube Videos
 * Version: 1.0
 * Plugin URI: http://www.justinwhall.com/
 * Description: Loads youtube videos on click significantly reducing page weight and page load time. 
 * Author: Justin W Hall
 * Author URI: http://www.justinwhall.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: faster-youtube-videos
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Justin Hall
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;


class Faster_Youtube_Videos
{
	
	function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_shortcode( 'fyv', array( $this, 'fyv_shortcode' ) );

	}

	public function enqueue_scripts() {
	   
	    wp_enqueue_script( 'faster-youtube-videos-js', plugins_url( '/faster-youtube-videos.js' , __FILE__ ), array( 'jquery' ) );
	    wp_enqueue_style( 'faster-youtube-videos-js', plugins_url( '/faster-youtube-videos.css' , __FILE__ ), array(  ), '1.0', 'all' );

	}

	public function fyv_shortcode( $atts ){

		$atts = shortcode_atts( array(
			'ytid' => false,
			'width' => false,
			'height' => false
		), $atts, 'fyv' );
		
		$img = '<div class="fyv-img-wrap" data-ytid="' . $atts['ytid'] . '"><img class="fyv-img" src="http://img.youtube.com/vi/' . $atts['ytid'] . '/0.jpg" /><div class="fyv-play">Play Video</div></div>';
		return $img;

	}

}

new Faster_Youtube_Videos();

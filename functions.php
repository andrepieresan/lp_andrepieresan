<?php
/**
 * Theme bootstrap.
 *
 * @package Andre_Pieresan_Landing
 */

if (!defined('ABSPATH')) {
	exit;
}

function andre_pieresan_landing_setup() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action('after_setup_theme', 'andre_pieresan_landing_setup');

function andre_pieresan_landing_assets() {
	$theme = wp_get_theme();
	$version = $theme->get('Version');

	wp_enqueue_style(
		'andre-pieresan-landing-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		$version
	);

	wp_enqueue_script(
		'andre-pieresan-landing-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$version,
		true
	);
}
add_action('wp_enqueue_scripts', 'andre_pieresan_landing_assets');

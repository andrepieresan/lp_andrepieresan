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

function andre_pieresan_landing_document_title($title) {
	if (is_front_page()) {
		return 'André Pieresan | Software Engineer | Agentic Engineer';
	}

	return $title;
}
add_filter('pre_get_document_title', 'andre_pieresan_landing_document_title');

function andre_pieresan_landing_social_meta() {
	if (!is_front_page()) {
		return;
	}

	$title = 'André Pieresan | Software Engineer | Agentic Engineer';
	$description = 'Engenharia de software e agentes de IA para modernizar plataformas, automatizar operações e escalar produtos B2B.';
	$image = get_template_directory_uri() . '/assets/img/andre-pieresan-social.png';
	?>
	<meta name="description" content="<?php echo esc_attr($description); ?>">
	<meta property="og:locale" content="pt_BR">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo esc_attr($title); ?>">
	<meta property="og:description" content="<?php echo esc_attr($description); ?>">
	<meta property="og:image" content="<?php echo esc_url($image); ?>">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr($title); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr($description); ?>">
	<meta name="twitter:image" content="<?php echo esc_url($image); ?>">
	<?php
}
add_action('wp_head', 'andre_pieresan_landing_social_meta', 5);

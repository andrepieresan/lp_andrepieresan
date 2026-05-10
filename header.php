<?php
/**
 * Header template.
 *
 * @package Andre_Pieresan_Landing
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#050505">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#conteudo">Pular para o conteúdo</a>
<header class="site-header" data-header>
	<a class="brand" href="#topo" aria-label="André Pieresan">
		<span class="brand__mark">AP</span>
		<span class="brand__name">André Pieresan</span>
	</a>
	<nav class="site-nav" aria-label="Navegação principal">
		<a href="#especialidades">Especialidades</a>
		<a href="#experiencia">Experiência</a>
		<a href="#stack">Stack</a>
		<a href="#contato">Contato</a>
	</nav>
	<a class="header-contact" href="https://wa.me/5545991463233" target="_blank">Falar agora</a>
</header>

<?php defined( 'ABSPATH' ) OR exit; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1"><![endif]-->

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicon.ico" />

	<?php wp_head(); ?>

	<meta name="robots" content="noodp" />
</head>

<body <?php body_class(); ?>>
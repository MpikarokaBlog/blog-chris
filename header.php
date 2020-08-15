<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); 
    	// this is the options array 
    	$theme_opts = get_option('bc_opts');

    ?>
</head>
<body>
	<header>

		<!--
		=================================================================
		=                      NAVBAR FRONT-PAGE
		=================================================================
		-->
		<nav id="mainNavbar" class="navbar navbar-expand-md navbar-dark mb-4 parallax" style="background-image: url('<?= $theme_opts['image_banner_url']; ?>');">
			<a class="navbar-brand" href="#">
				<img class="img-fluid" src="<?= $theme_opts['image_logo_url']; ?>"/>
			</a>
			<button class="navbar-toggler" id="navbarToggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<?php wp_nav_menu(array(
            	'menu' => 'top-menu',
	            'theme_location'  => 'primary',
	            'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
	            'container'       => 'div',
	            'container_class' => 'flex-row-reverse collapse navbar-collapse',
	            'container_id'    => 'navbarCollapse',
	            'menu_class'      => 'navbar-nav',
	            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
	            'walker'          => new WP_Bootstrap_Navwalker(),
            )); ?>
		</nav>

		<!--
		=================================================================
		=                  BANNER FOR FRONT-PAGE ONLY
		=================================================================
		-->
		<?php if(is_front_page(  )): ?>

			<div id="img-banner" class="border-bottom parallax" style="background-image: url('<?= $theme_opts['image_banner_url']; ?>')">
				
				<div class="container">
					<div id="legendText" class="d-flex flex-column">
						<h1 class="mt-3 h5 text-left"><?= $theme_opts['legend_logo']; ?></h1>
						<a id="btnJoin" href="/" role="button" class="mb-4 w-25 p-2 btn btn-primary btn-lg align-self-end text-truncate">Join in!</a>
					</div>
				</div>	
			</div>

		<?php endif; ?>
	</header>
	
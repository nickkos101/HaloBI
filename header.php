<!DOCTYPE html>
<html>
<head>
	<title><?php wp_title( '' ); ?></title>
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/png">
	<?php wp_head(); ?>
</head>
<body class="col-wrap">
	<header id="top">
		<div class="container spacer">
			<div class="column fourth">
				<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="logo" alt="Halo Business Inteligence"></a>
			</div>
			<div class="column three-fourths talignright">
				<nav>
						<?php wp_nav_menu(array('theme_location' => 'Header_Nav',)); ?>
				</nav>
				<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
					<label>
						<input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:" />
					</label>
					<button type="submit" class="search-submit" value="Search" ></button>
				</form>
			</div>
		</div>
	</header>
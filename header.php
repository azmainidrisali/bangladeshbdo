<?php global $bangladeshbdooption; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand mr-auto mr-lg-0" href="#"><?php bloginfo('name')?></a>
	<button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
		<span class="nav-icon"><i class="fa fa-bars"></i></span>
	</button>

	<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">

	<?php /* Primary navigation */
		wp_nav_menu( array(
		'menu' => 'HomeMainMenu',
		'depth' => 2,
		'container' => false,
		'menu_class' => 'nav',
		//Process nav menu using our custom nav walker
		'walker' => new wp_bootstrap_navwalker())
		);
	?>

		<!-- <ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">প্রথম পৃষ্ঠা</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ভাষা পরিবর্তন করুন</a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
					
				</div>
			</li>
		</ul> -->
	</div>
</nav>

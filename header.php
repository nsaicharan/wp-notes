<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo( 'title' ) ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>

	<header class="container">
		<nav class="site-nav">
			<h1><a class="site-nav__logo" href="<?php echo site_url('/'); ?>">NOTES</a></h1>

			<div>
				<?php if ( is_user_logged_in() ) :  ?>
				<a class="btn btn--sm btn--secondary site-nav__link" href="<?php echo site_url('/my-notes'); ?>">My Notes</a>
				<a class="btn btn--sm btn--danger site-nav__link" href="<?php echo wp_logout_url(); ?>">Logout</a>
				
				<?php else : ?>
				
				<a class="btn btn--sm btn--secondary site-nav__link" href="<?php echo wp_login_url(); ?>">Login</a>
				<a class="btn btn--sm btn--danger site-nav__link" href="<?php echo wp_registration_url(); ?>">Sign Up</a>
				
				<?php endif ?>
			</div>
		</nav>
	</header>
	

<?php if ( ! isset( $_SESSION ) ) session_start(); ?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title(); ?></title>
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<?php do_action( 'et_head_meta' ); ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php $template_directory_uri = get_template_directory_uri(); ?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( $template_directory_uri . '/js/html5.js"' ); ?>" type="text/javascript"></script>
	<![endif]-->

	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page-container">
<?php
	if ( is_page_template( 'page-template-blank.php' ) ) {
		return;
	}

	$et_secondary_nav_items = et_divi_get_top_nav_items();

	$et_phone_number = $et_secondary_nav_items->phone_number;

	$et_email = $et_secondary_nav_items->email;

	$et_contact_info_defined = $et_secondary_nav_items->contact_info_defined;

	$show_header_social_icons = $et_secondary_nav_items->show_header_social_icons;

	$et_secondary_nav = $et_secondary_nav_items->secondary_nav;

	$et_top_info_defined = $et_secondary_nav_items->top_info_defined;
?>
	
	
		<header id="main-header" data-height-onload="<?php echo esc_attr( et_get_option( 'menu_height', '66' ) ); ?>">
			<div class="container clearfix et_menu_container">
			
			<?php
				$logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && '' != $user_logo
					? $user_logo
					: $template_directory_uri . '/images/logo.png';
			?>
				<div class="logo_container">
					<span class="logo_helper"></span>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" id="logo" data-height-percentage="<?php echo esc_attr( et_get_option( 'logo_height', '54' ) ); ?>" />
					</a>
				</div>
				<?php if ( $et_top_info_defined ) : ?>

				<div class="icons-header">
					<a href="#" class="link-icon-header"><span class="icon-twitter"></span></a>
					<a href="#" class="link-icon-header"><span class="icon-mail"></span></a>
					<div class="search-container">
						<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php
								printf( '<input type="search" class="search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
									esc_attr__( 'Busca', 'Divi' ),
									get_search_query(),
									esc_attr__( 'Search for:', 'Divi' )
								);
							?>
							<input type="submit" value="Enviar" class="input-search" />
							</form>
					</div>

				</div>
				<div class="clearfix line-header"></div>
				<?php endif; // true ==== $et_top_info_defined ?>

				<div id="et-top-navigation" data-height="<?php echo esc_attr( et_get_option( 'menu_height', '40' ) ); ?>" data-fixed-height="<?php echo esc_attr( et_get_option( 'minimized_menu_height', '40' ) ); ?>">
					<nav id="top-menu-nav">
					<?php
						$menuClass = 'nav';
						if ( 'on' == et_get_option( 'divi_disable_toptier' ) ) $menuClass .= ' et_disable_top_tier';
						$primaryNav = '';

						$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => 'top-menu', 'echo' => false ) );

						if ( '' == $primaryNav ) :
					?>
						<ul id="top-menu" class="<?php echo esc_attr( $menuClass ); ?>">
							<?php if ( 'on' == et_get_option( 'divi_home_link' ) ) { ?>
								<li <?php if ( is_home() ) echo( 'class="current_page_item"' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'Divi' ); ?></a></li>
							<?php }; ?>

							<?php show_page_menu( $menuClass, false, false ); ?>
							<?php show_categories_menu( $menuClass, false ); ?>
						</ul>
					<?php
						else :
							echo( $primaryNav );
						endif;
					?>
					</nav>



					<?php do_action( 'et_header_top' ); ?>
				</div> <!-- #et-top-navigation -->
			</div> <!-- .container -->
		</header> <!-- #main-header -->

		<div id="et-main-area">
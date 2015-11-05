<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/flexslider.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/jquery.fancybox.css" media="screen" />
	<script src="<?php bloginfo('template_url');?>/js/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/jquery.flexslider.js" defer=""></script>
	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.fancybox.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<div id="Header_Bg">
		<div class="search_home">
			<div class="bg_top"></div>
			<div class="search-box">
				<span class="magnify"></span>
				<?php get_search_form(); ?>
			</div>
		</div>
		<div id="Header">
			<a href="/" class="logo"></a>
			<div class="menu">
				
				<marquee> <span class="text_animation">sự hài lòng của quý khách là niềm vinh hạnh cho công ty chúng tôi. </span></marquee>
				<div id="navbar" class="navbar">					
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>					
				</div><!-- #navbar -->
			</div>
		</div>
	</div>
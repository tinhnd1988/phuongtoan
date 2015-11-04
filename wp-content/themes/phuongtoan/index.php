<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: false,  
		});
		$('.fancybox').fancybox();
	});
</script>
<div class="slider">
	<!-- Place somewhere in the <body> of your page -->
	<div class="flexslider">
		<ul class="slides">
			<li>
			  <img alt="Phuongtoan" src="<?php bloginfo('template_url');?>/images/banner.jpg" style="width:100%;">
			</li>
			<li>
			  <img alt="Phuongtoan" src="<?php bloginfo('template_url');?>/images/banner.jpg" style="width:100%;">
			</li>
			<li>
			  <img alt="Phuongtoan" src="<?php bloginfo('template_url');?>/images/banner.jpg" style="width:100%;">
			</li>
			<li>
			  <img alt="Phuongtoan" src="<?php bloginfo('template_url');?>/images/banner.jpg" style="width:100%;">
			</li>
		</ul>
	</div>
</div>

	

<?php get_footer(); ?>

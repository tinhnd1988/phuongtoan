<?php
/*
/*
/* Template Name: Trang chủ
/*
*/
get_header();

?>
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

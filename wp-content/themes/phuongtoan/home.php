<?php
/*
/*
/* Template Name: Trang chủ
/*
*/
get_header();

echo do_shortcode("[huge_it_slider id='1']"); //Display Homepage Slider
?>

<div class="home-page-content">
	<?php echo get_page(14)->post_content; ?>
</div>
	

<?php get_footer(); ?>

<?php
/*
/*
/* Template Name: Lien He
/*
*/
get_header();
?>

<div id="lienhe-page-content">
	<div class="lienhe-page">
		<div class="Left_page">
			<div class="lien_he_page">
				<span class="name_cty">Công ty tnhh sản xuất thương mại quảng cáo phương toàn</span><br>
				<span>ĐT: 08 3606 2577 / 0905 333 188</span><br>
				<span>Email: phuongtoan.vn@gmail.com</span>
			</div>
			<?php 
				$id=23; 
				$post = get_post($id); 
				$content = apply_filters('the_content', $post->post_content); 
				echo $content;  
			?>
		</div>
		<div class="right_page">
			map
		</div>
	</div>
</div>	
	

<?php get_footer(); ?>

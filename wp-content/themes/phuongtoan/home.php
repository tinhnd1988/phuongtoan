<?php
/*
/*
/* Template Name: Trang chủ
/*
*/
get_header();

echo do_shortcode("[huge_it_slider id='1']"); //Display Homepage Slider
?>

<div id="home-page-content">
	<div class="ads-content">
		<h2>Phương Toàn</h2>
		<ul>
			<li><span></span>Chuyên tư vấn - thiết kế - thi công: led, alu, pano, chữ nổi, bảng hiệu, hộp đèn, cửa, cầu thang, lan can, nhà tiền chế, mái xếp lượn sóng, mái tôn, nhà vòm, mái hiên di động, tấm lợp lấy sáng poly...</li>
			<li><span></span>Thiết kế - thi công cafe sân vườn, quán ăn, nhà hàng, trường học, hồ bơi...</li>
			<li><span></span>Nhận thi công tất cả các tỉnh &amp; thành phố</li>
		</ul>
	</div>
	<div class="random-cates">
		<ul>
			<?php
				$args = array(
					'type'                     => 'post',
					'child_of'                 => 0,
					'parent'                   => 0,
					'orderby'                  => 'name',
					'order'                    => 'ASC',
					'hierarchical'             => 1,
					'exclude'                  => '',
					'include'                  => '',
					'number'                   => '',
					'hide_empty'               => 0,
					'taxonomy'                 => 'danh-muc',
					'pad_counts'               => false 

				);
				$categories = get_categories($args);
				
				$nCatesDisplay = 4;
				$nCate = 0;

				while ($nCate < $nCatesDisplay) :
					//$randCatesKey = array_rand($categories, $nCatesDisplay);
					foreach ($categories as $cate) :
						if ($nCate >= $nCatesDisplay)
							break;
				    	$product = query_posts(array( 
						    'post_type' => 'san-pham',
						    'showposts' => 1,
						    'tax_query' => array(
						    	array(
							        'taxonomy' => 'danh-muc',
							        'terms' => $cate->term_id,
							        'field' => 'term_id'
							    ),
						    ),
						    'orderby' => 'rand',
						    'order' => 'ASC',
						    'posts_per_page' => -1
						));		
			?>

			<?php				
						if (!empty($product)):
							$nCate++;
					    	$meta_value_cate = get_post_meta($product[0]->ID); 
					    	$url_cate = wp_get_attachment_url( get_post_thumbnail_id($product[0]->ID) );
					        $img_featured = get_the_post_thumbnail($product[0]->ID, 'medium');
					        $permalink = get_permalink($product[0]->ID);			
			?>
				    		<li>
								<div class="box">
									<a href="<?php echo $permalink; ?>">								
										<?php if ($img_featured): ?>
											<div class="imgsp"><?php echo $img_featured; ?></div>
											<?php else: ?>
												<img src="<?php bloginfo('template_url');?>/images/noimages.jpeg" width="220" height="190">
										<?php endif; ?>
										<h2><?php echo $cate->name; ?></h2>
										<p class="cate-desc"><?php echo $cate->category_description ?></p>
									</a>
									<div class="button">
										<button class="icon_right"><a href="<?php echo $permalink; ?>">Xem thêm</a></button>
									</div>
								</div>
							</li>

	    	<?php 		endif; 
					endforeach;
				endwhile;
	    	?>

			<?php  ?>
		</ul>

	</div>
</div>


<?php get_footer(); ?>

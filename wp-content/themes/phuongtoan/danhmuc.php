<?php
/*
/*
/* Template Name: Danh Muc
/*
*/
get_header();
?>
<div class="DanhMuc">
	<h1>Danh Mục Sản Phẩm</h1>
	<div id="tabs">
		<ul class="list_category">
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
			$i=1; $j=1;
			$ca_tabs = array();
			foreach($categories as $category) : $ca_tabs[$i]['category_id'] = $category->term_id; ?>
				<?php /*<li><a href="<?php echo get_term_link( $category->slug, 'danh-muc' );?>"> <?php echo $category->name; ?></a></li>*/?>
				<li class="ui_tabs <?php if($i==1) echo 'active';?>"><a href="#tabs-<?php echo $category->term_id; ?>"><?php echo $category->name; ?></a></li>    
			<?php $i++; endforeach; ?>
		</ul>
		<?php 
		//foreach ($ca_tabs as $cat) :
		foreach($categories as $category):
			$args_post = array('post_type' => 'san-pham', 'order' => 'ASC', 'numberposts' => -1 );
	    	//$products = get_posts($args_post);
	    	$products = query_posts(array( 
			    'post_type' => 'san-pham',
			    'showposts' => -1,
			    'tax_query' => array(
			    	array(
				        'taxonomy' => 'danh-muc',
				        'terms' => $category->term_id,
				        'field' => 'term_id'
				    ),
			    ),
			    'orderby' => 'title',
			    'order' => 'ASC'
			));?>
			<div class="display_none <?php if($j==1) echo 'show_div';?>" id="tabs-<?php echo $category->term_id;?>">
				<ul>
		    	<?php 
		    		if (empty($products))
		    			echo '<h2>Danh mục chưa có sản phẩm</h2>';

		    		foreach( $products as $product ) :
				    	$meta_value_cate = get_post_meta($product->ID); 
				    	$url_cate = wp_get_attachment_url( get_post_thumbnail_id($product->ID) );
				        $img_featured = get_the_post_thumbnail($product->ID, 'medium');
				        $img_url = simplexml_load_string(get_the_post_thumbnail($product->ID, 'full'))->attributes()->src;
				        $permalink = get_permalink($product->ID);
		    	?>
		    		<li>
						<div class="box">
							<a class="fancybox" href="<?php echo $img_url ?>">								
								<?php if ($img_featured): ?>
									<div class="imgsp"><?php echo $img_featured; ?></div>
									<?php else: ?>
										<img src="<?php bloginfo('template_url');?>/images/noimages.jpeg" width="220" height="190">
								<?php endif; ?>
								<h2><?php echo $product->post_title; ?></h2>
							</a>
							<div class="button">
								<button class="icon_right"><a class="fancybox" href="<?php echo $img_url ?>">Chi tiết sản phẩm</a></button>
							</div>
						</div>
					</li>
		    	<?php $j++; endforeach;?>
		    	</ul>
		    </div>
		<?php endforeach;?>
	</div>
</div>
<script>
  $(function() {
    $(".ui_tabs").click(function(){
    	$('.ui_tabs').removeClass('active');
    	$(this).addClass('active');
    	var id_tab = $(this).find('a').attr('href');
    	$('.display_none').hide();
    	$(id_tab).show();
    	return false;
    });
  });
  $('.fancybox').fancybox({
	'padding' : 0,
	'border-width': 0,  	
  });
  </script>
<?php get_footer(); ?>

<?php
/*
/*
/* Template Name: Danh Muc
/*
*/
get_header();
?>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
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
			$i=1;
			$ca_tabs = array();
			foreach($categories as $category) : $ca_tabs[$i]['category_id'] = $category->term_id; ?>
				<?php /*<li><a href="<?php echo get_term_link( $category->slug, 'danh-muc' );?>"> <?php echo $category->name; ?></a></li>*/?>
				<li><a href="#tabs-<?php echo $category->term_id; ?>"><?php echo $category->name; ?></a></li>    
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
			<div id="tabs-<?php echo $category->term_id;?>">
		    	<?php foreach( $products as $product ) :
			    	$meta_value_cate = get_post_meta($product->ID); 
			    	$url_cate = wp_get_attachment_url( get_post_thumbnail_id($product->ID) );
			        $img_featured = get_the_post_thumbnail($product->ID, 'medium');
			        $permalink = get_permalink($product->ID);
		    		?>
					<div class="box">
						<a href="<?php echo $permalink; ?>">
							<h2><?php echo $product->post_title; ?></h2>
							<?php if ($img_featured): ?>
								<div class="imgsp"><?php echo $img_featured; ?></div>
								<?php else: ?>
									<img src="<?php bloginfo('template_url');?>/images/noimages.jpeg" width="220" height="190">
							<?php endif; ?>					
						</a>
					</div>
		    	<?php endforeach;?>
		    </div>
		<?php endforeach;?>
	</div>
</div>
<?php get_footer(); ?>

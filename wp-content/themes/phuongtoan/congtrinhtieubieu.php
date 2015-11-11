<?php
/*
/*
/* Template Name: Cong Trin Tieu Bieu
/*
*/
get_header();
?>

<div id="CTTB-page-content">
	<ul>
		<?php $products = query_posts(array( 
			    'post_type' => 'post',
			    'showposts' => -1,
			    'tax_query' => array(
			    	array(
				        'taxonomy' => 'category',
				        'terms' => 14,
				        'field' => 'term_id'
				    ),
			    ),
			    'orderby' => 'title',
			    'order' => 'ASC'
			)); 
		foreach( $products as $product ) :
			    	$meta_value_cate = get_post_meta($product->ID); 
			    	$url_cate = wp_get_attachment_url( get_post_thumbnail_id($product->ID) );
			        $img_featured = get_the_post_thumbnail($product->ID, 'full');
			        $permalink = get_permalink($product->ID); ?>
			        <li>
			        	<div class="content_cttb">
		        			<div class="imgsp"><a href="<?php echo $permalink; ?>"><?php echo $img_featured; ?></a></div>
		        			<h2><a href="<?php echo $permalink; ?>"><?php echo $product->post_title; ?></a></h2>
			        	</div>
			        </li>
		<?php endforeach;
		?>
	</ul>
</div>	
	

<?php get_footer(); ?>

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
			        $img_featured = get_the_post_thumbnail($product->ID, 'medium');
			        $permalink = get_permalink($product->ID); ?>
			        <li>
			        	<div>
			        		<div class="imgsp"><?php echo $img_featured; ?></div>
			        		<h2><?php echo $product->post_title; ?></h2>
			        	</div>
			        </li>
		<?php endforeach;
		?>
		<li></li>
	</ul>
</div>	
	

<?php get_footer(); ?>

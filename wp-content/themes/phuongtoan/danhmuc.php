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
				<li><a href="#tabs-<?php echo $i; ?>"><?php echo $category->name; ?></a></li>    
			<?php $i++; endforeach; ?>
		</ul>
		<?php 		
		$j=1;

		foreach ($ca_tabs as $value) :			
			$leaderships = new WP_Query(array( 
    'post_type' => 'san-pham',
    'showposts' => -1,
    'tax_query' => array(
        'taxonomy' => 'danh-muc',
        'terms' => $value,
        'field' => 'term_id'
    ),
    'orderby' => 'title',
    'order' => 'ASC'
));
			$args_post = array('post_type' => 'san-pham','category' => $value, 'order' => 'ASC', 'numberposts' => -1 );
	    	$datacates = get_posts($args_post);
	    	foreach( $datacates as $datacate ) :
	    	$meta_value_cate = get_post_meta($datacate->ID); 
	    	$url_cate = wp_get_attachment_url( get_post_thumbnail_id($datacate->ID) );
	        $img_featured = get_the_post_thumbnail($datacate->ID, 'medium');
	        $permalink = get_permalink($datacate->ID);
	    ?>
				<div class="box">
					<a href="<?php echo $permalink; ?>"><h2><?php echo $datacate->post_title; ?></h2></a>
					<?php if ($img_featured): ?>
						<a href="<?php echo $permalink; ?>"><div class="imgsp"><?php echo $img_featured; ?></div></a>
						<?php else: ?>
							<img src="<?php bloginfo('template_url');?>/images/noimages.jpeg" width="220" height="190">
					<?php endif; ?>					
				</div>

	    	<?php
	    	endforeach;
	    	$j++;		
		endforeach;			
		   ?> 
		<div id="tabs-1">
		    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
	  	</div>
		<div id="tabs-2">
		    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
		</div>
		<div id="tabs-3">
		    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
		    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
		</div>
	</div>
</div>
<?php get_footer(); ?>

<?php
/*
/*
/* Template Name: Danh Muc
/*
*/
get_header();
?>

<h1>Danh Mục Sản Phẩm</h1>
<ul>
<?php
$args = array(
	'type'                     => 'post',
	'child_of'                 => 0,
	'parent'                   => 0,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'hide_empty'               => 0,
	'taxonomy'                 => 'danh-muc',
	'pad_counts'               => false 

); 
	$categories = get_categories($args);
	foreach($categories as $category) : ?>
		<li><a href="<?php echo get_category_link( $category->term_id ); ?>"> <?php echo $category->name; ?></a>  </li>		
	<?php endforeach; ?>
</ul>

<?php get_footer(); ?>

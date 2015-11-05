<?php
/*
/*
/* Template Name: Danh Muc
/*
*/
get_header();
?>

<h1>Danh Mục Sản Phẩm</h1>
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
	'taxonomy'                 => 'danh-muc',
	'pad_counts'               => false 

); 
	$categories = get_categories($args);
	foreach($categories as $category) {
		print_r($category);
		echo $category->name.'<br>';
	}
?>

<?php get_footer(); ?>

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
	$category_ids = get_all_category_ids();
	foreach($category_ids as $cat_id) {
		$cat_name = get_cat_name($cat_id);
		echo $cat_name.'<br>';
	}
?>

<?php get_footer(); ?>

<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="leftCol">
		<?php
			// Post thumbnail.
			twentyfifteen_post_thumbnail();
		?>
	</div>
	<div class="rightCol">
		<header class="entry-header">
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				endif;
			?>
		</header><!-- .entry-header -->

		<div class="entry-attribute">
			<?php
				$price = types_render_field( "gia", array( ) );
				$madein = types_render_field( "xuat-xu", array( ) );
				$warranty = types_render_field( "bao-hanh", array( ) );				
			?>
			<p><label>Giá</label>: <?php echo $price ?></p>
			<p><label>Xuất xứ</label>: <?php echo $madein ?></p>
			<p><label>Bảo hành</label>: <?php echo $warranty ?></p>
		</div><!-- .entry-content -->

	</div>
	<div class="clear"></div>
	<div class="entry-content">
		<div class="description-title">
			Thông tin sản phẩm
		</div>
		<div class="description">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'twentyfifteen' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );
			?>
		</div>
		<div class="clear"></div>
	</div>
	
</article><!-- #post-## -->

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>	

	<div id="Footer"> 
		<div class="content_f"> 
			<div class="footer_left">
				
				<?php 
					wp_reset_query();
					wp_nav_menu( array( 
						'theme_location' => 'primary', 
						'menu_class' => 'menu_footer', 
						'menu' => 'Internal'
					) ); 
				?>						
			
				<div class="line_f"></div>
				<div><span class="icon hom"></span> <span class="name_cty">Công ty tnhh sản xuất thương mại quảng cáo phương toàn</span>
				<br><span class="diachi">Đc: 110A Lê Niệm, P. Phú Thạnh , Q. Tân Phú </span></div>
				<div> 
					<div class="Fl_left"><span class="icon call"></span> ĐT: 08 3606 2577 / 0905 333 188</div>
					<div><span class="icon fax"></span> Fax: 08 3978 3442 </div>
				</div>
				<div><span class="icon email"></span> Email: phuongtoan.vn@gmail.com </div>
				<p class="copyright">&copy; Bản quyền thuộc về công ty TNHH sản xuất - thương mại - quảng cáo PHƯƠNG TOÀN </p>
			</div>
			<div class="footer_right">
				<h3 class="title">STAY CONNECTED</h3>
				<div class="line_f"></div>
				<ul>
					<li><a href="#" class="icon face"></a> </li>
					<li><a href="#" class="icon twitter"></a> </li>
					<li><a href="#" class="icon google"></a> </li>
					<li><a href="#" class="icon youtube"></a> </li>
					<li><a href="#" class="icon printer"></a> </li>
				</ul>
				<span>LIKE US on FACEBOOK</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="footer_bottom"></div>
 
	</div>


</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>

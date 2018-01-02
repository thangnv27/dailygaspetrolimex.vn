<div class="col-md-3 sidebar">
	<div class="sidebar-widget">
		<h3 class="widget-title">Danh mục sản phẩm</h3>
		<div class="widget-sub danh-muc-menu">
			<?php wp_nav_menu(array('theme_location'=>'danh-muc-menu', 'container'=>'')); ?>
		</div>
	</div>
	<?php
		if(!is_front_page()) {
			if(is_active_sidebar('sidebar-left')){
				dynamic_sidebar('sidebar-left');
			}
		}
	?>
</div>
<!-- end sidebar -->
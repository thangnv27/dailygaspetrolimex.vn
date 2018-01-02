<?php get_header(); ?>
	<section id="main-content">
		<div class="container">
			<div class="row">
				<?php get_sidebar(); ?>
				<div class="col-md-9 content-right">
					<h2 class="box-title">
						<?php 
							if(have_posts()) {
								echo 'Sản phẩm tìm kiếm với từ khóa &#039;'. $_GET['s'].'&#039;';
							}else{
								echo 'Không có sản phẩm phù hợp với từ khóa &#039;'. $_GET['s'].'&#039;';
							} 
						?>
					</h2>
					<div class="product-list">
						<div class="row">
							<?php
								$category = get_queried_object(); 
								$cat_id = $category->cat_ID;
								if(have_posts()) : while (have_posts()): the_post();
								$thumb_id = get_post_thumbnail_id(get_the_ID());
			    				$img = wp_get_attachment_url($thumb_id);
			    				$gia_ban = get_field('gia_ban');
			    				$gia_km = get_field('gia_km');
							?>
								<div class="col-md-4 col-xs-6 product-item">
									<div class="product-img">
										<a href="<?php the_permalink(); ?>"><img src="<?php echo $img; ?>" /></a>
									</div>
									<h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p class="gia">Giá: <?php echo ($gia_ban == 0 || $gia_ban == '') ? 'Liên hệ' : $gia_ban . ' VNĐ' ?></p>
									<?php if($gia_km != '') { ?>
										<p class="gia-km">Giá KM: <?php echo $gia_km; ?> VNĐ</p>
									<?php } ?>
								</div>
							<?php
								endwhile; endif; wp_corenavi_table(); wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end main-content -->
<?php get_footer(); ?>

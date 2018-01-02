<?php
/*
* Template name: Đối tác Page
*/
?>
<?php get_header(); ?>
	<section id="main-content">
		<div class="container">
			<div class="row">
				<?php get_sidebar(); ?>
				<div class="col-md-9 content-right">
					<h2 class="page-title box-title">
						<?php the_title(); ?>
					</h2>
					<div class="doi-tac-list">
						<?php
		                    if(have_rows('doi_tac_list')) : while (have_rows('doi_tac_list')): the_row();
		                    	$logo = get_sub_field('logo');
								$ten_cong_ty = get_sub_field('ten_cong_ty');
								$dia_chi = get_sub_field('dia_chi');
								$dien_thoai = get_sub_field('dien_thoai');
								$website = get_sub_field('website');
		                ?>
							<div class="doi-tac-item">
								<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
								<div class="doi-tac-info">
									<p><strong>Tên công ty: </strong><?php echo $ten_cong_ty; ?></p>
									<p><strong>Địa chỉ: </strong><?php echo $dia_chi; ?></p>
									<p><strong>Điện thoại/FAX: </strong><?php echo $dien_thoai; ?></p>
									<p><strong>Website: </strong><?php echo $website; ?></p>
								</div>
							</div>
		                <?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end main-content -->
<?php get_footer(); ?>
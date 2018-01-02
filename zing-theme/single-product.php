<?php get_header(); ?>
	<section id="main-content">
		<div class="container">
			<div class="row">
				<?php get_sidebar(); ?>
				<div class="col-md-9 content-right">
					<h2 class="page-title box-title">
						<?php the_title(); ?>
					</h2>
					<div class="product-content">
						<div class="row">
							<div class="col-md-5 product-left">
								<div class="product-slider">
									<div class="img-main">
										<?php the_post_thumbnail(); ?>
									</div>
								</div>
							</div>
							<div class="col-md-7 product-right">
								<div class="product-info">
									<h3 class="single-title"><?php the_title(); ?></h3>
									<p class="gia">Giá bán: <?php the_field('gia_ban'); ?> VNĐ</p>
									<?php if(get_field('gia_km') != '') { ?>
										<p class="gia-km">Giá KM: <?php the_field('gia_km'); ?> VNĐ</p>
									<?php } ?>
									<p>Thương hiệu: <?php the_field('thuong_hieu'); ?></p>
									<p>
										Tình trạng: <?php echo (get_field('tinh_trang') == 'con-hang') ? 'Còn hàng' : 'Hết hàng';  ?>
									</p>
									<p>Thương hiệu: <?php the_field('bao_hanh'); ?></p>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="zing-tab">
									<div class="tab-header">
										<ul>
											<li><a href="#tab1" class="active">Thông tin sản phẩm</a></li>
										</ul>
									</div>
									<div class="clr"></div>
									<div class="tab-content zing-content">
										<div id="tab1" class="tab tab-thong-so">
											<?php
												if(have_posts()) : while (have_posts()): the_post();
													the_content();
												endwhile; endif; wp_reset_postdata();
											?>
											<div class="share-box">
						                        <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-mobile-iframe="true"></div>
						                        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
						                        <div>
						                        	<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
													<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						                        </div>
						                        <div class="google-button">
						                            <script src="https://apis.google.com/js/platform.js" async defer></script><g:plusone data-href="<?php the_permalink(); ?>" size="medium"></g:plusone>
						                        </div>
						                    </div>
						                    <div class="clr"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="sp-lien-quan">
						<h2 class="page-title box-title">
							Sản phẩm cùng loại
						</h2>
						<div class="product-list">
							<div class="row">
								<?php
									$term = wp_get_post_terms($post->ID, 'product-category');
									$args = array(
											'post_type' => 'product',
											'posts_per_page' => 3,
											'post__not_in' => array(get_the_ID()),
											'tax_query' => array(
												array(
													'taxonomy' => 'product-category',
													'field'    => 'term_id',
													'terms'    => array($term[0]->term_id),
												),
											),
										);
									query_posts($args);
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
									endwhile; endif; wp_reset_postdata();
								?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- end main-content -->
<?php get_footer(); ?>

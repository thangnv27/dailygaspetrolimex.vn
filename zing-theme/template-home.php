<?php
/*
* Template name: Home Page
*/
?>
<?php get_header(); ?>
	<section id="main-content">
		<div class="container">
			<div class="row">
				<?php get_sidebar(); ?>
				<div class="col-md-9 content-right">
					<div class="slideshow">
			             <div class="owl-carousel slider">
			                <?php
			                    if(have_rows('slideshow', 'option')) : while (have_rows('slideshow', 'option')): the_row();
									$img = get_sub_field('image');
									$link = get_sub_field('link');
			                ?>
			                    <div class="item">
			                        <?php if($link == '') : ?>
			                            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" />
			                        <?php else : ?>
			                            <a href="<?php $link; ?>"><img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" /></a>
			                        <?php endif; ?>
			                        <div class="slide-bg"></div>
			                    </div>
			                <?php endwhile; endif; wp_reset_postdata(); ?>
			            </div>
				    </div>
				</div>
			</div>

			<div class="home-box">
				<h2 class="page-title box-title">
					<?php the_field('title_box1'); ?>
				</h2>
				<?php the_field('content_box1'); ?>
			</div>

			<div class="home-box">
				<h2 class="page-title box-title">
					<?php the_field('title_box2'); ?>
				</h2>
				<div class="product-list">
					<div class="row">
						<?php
							if(get_field('taxonomy_box2') == ''){
								$args = array(
									'post_type' => 'product',
									'posts_per_page' => get_field('num_box2'),
								);
							}else{
								$args = array(
									'post_type' => 'product',
									'posts_per_page' => get_field('num_box2'),
									'tax_query' => array(
										array(
											'taxonomy' => 'product-category',
											'field'    => 'term_id',
											'terms'    => array(get_field('taxonomy_box2')),
										),
									),
								);
							}
							query_posts($args);
							if(have_posts()) : while (have_posts()): the_post();
							$thumb_id = get_post_thumbnail_id(get_the_ID());
		    				$img = wp_get_attachment_url($thumb_id);
		    				$gia_ban = get_field('gia_ban');
		    				$gia_km = get_field('gia_km');
						?>
							<div class="col-md-3 col-xs-6 product-item">
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
							endwhile; endif; wp_reset_query();
						?>
					</div>
				</div>
			</div>

			<div class="home-box">
				<h2 class="page-title box-title">
					<?php the_field('title_box3'); ?>
				</h2>
				<div class="home-post-list">
					<div class="row">
						<?php
							if(get_field('taxonomy_box3') == ''){
								$args = array(
									'post_type' => 'post',
									'posts_per_page' => get_field('num_box3'),
								);
							}else{
								$args = array(
									'post_type' => 'post',
									'posts_per_page' => get_field('num_box3'),
									'tax_query' => array(
										array(
											'taxonomy' => 'category',
											'field'    => 'term_id',
											'terms'    => array(get_field('taxonomy_box3')),
										),
									),
								);
							}
							$query = query_posts($args);
							if(have_posts()) : while (have_posts()): the_post();
							$thumb_id = get_post_thumbnail_id(get_the_ID());
		    				$img = wp_get_attachment_url($thumb_id);
						?>
							<div class="col-md-3 col-xs-6 home-post-item">
								<a href="<?php the_permalink(); ?>"><img src="<?php echo zing_resize($img, 265, 155); ?>" /></a>
								<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="post-excerpt"><?php echo cutstr(get_the_excerpt(), 100); ?></p>
							</div>
						<?php
							endwhile; endif; wp_reset_query();
						?>
					</div>
				</div>
			</div>

		</div>
	</section>
	<!-- end main-content -->
<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function ($) {
    	$(".slider").owlCarousel({ 
            items : 1,
            loop: $('.slider .item').size() > 1 ? true:false,
            autoplay: 'auto',
            nav:false,
            dots: true,
            autoplayTimeout:5000
         });
    });
</script>
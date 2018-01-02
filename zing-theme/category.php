<?php get_header(); ?>
	<section id="main-content">
		<div class="container">
			<div class="row">
				<?php get_sidebar(); ?>
				<div class="col-md-9 content-right">
					<h2 class="box-title">
						<?php echo single_cat_title( '', false ); ?>
					</h2>
					<div class="post-list">
						<?php
							$category = get_queried_object(); 
							$cat_id = $category->cat_ID;
							if(have_posts()) : while (have_posts()): the_post();
							$thumb_id = get_post_thumbnail_id(get_the_ID());
		    				$img = wp_get_attachment_url($thumb_id);
						?>
							<div class="post-item">
								<a href="<?php the_permalink(); ?>"><img src="<?php echo zing_resize($img, 220, 150); ?>" /></a>
								<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="excerpt"><?php echo cutstr(get_the_excerpt(), 350); ?></p>
							</div>
						<?php
							endwhile; endif; wp_corenavi_table(); wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end main-content -->
<?php get_footer(); ?>

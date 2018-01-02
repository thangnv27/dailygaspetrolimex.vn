<?php
	$args = array(
			'posts_per_page' => $quantity
	);
	$wp_query = new WP_Query($args);
	
	if($wp_query->have_posts()) :
?>
	<ul>
		<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				<a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
			</li>
		<?php endwhile; wp_reset_postdata(); ?>
	</ul>
<?php endif;?>

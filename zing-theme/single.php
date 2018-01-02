<?php get_header(); ?>
	<section id="main-content">
		<div class="container">
			<div class="row">
				<?php get_sidebar(); ?>
				<div class="col-md-9 content-right">
					<h2 class="page-title box-title">
						<?php the_title(); ?>
					</h2>
					<div class="post-content zing-content">
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

					<div class="tin-lien-quan">
						<h2 class="page-title box-title">
							Tin liên quan
						</h2>
						<div class="tin-lien-quan-list">
							<ul>
								<?php
									$term = wp_get_post_terms($post->ID, 'category');
									$args = array(
											'post_type' => 'post',
											'posts_per_page' => 5,
											'post__not_in' => array(get_the_ID()),
											'tax_query' => array(
												array(
													'taxonomy' => 'category',
													'field'    => 'term_id',
													'terms'    => array($term[0]->term_id),
												),
											),
										);
									query_posts($args);
									if(have_posts()) : while (have_posts()): the_post();
								?>
									<li class="tin-lien-quan-item">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</li>
								<?php
									endwhile; endif; wp_reset_postdata();
								?>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- end main-content -->
<?php get_footer(); ?>

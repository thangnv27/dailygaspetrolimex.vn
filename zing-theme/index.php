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
	<footer id="footer">
		<div class="container">
			<div class="dai-ly-list">
				<div class="row">
					<?php
	                    if(have_rows('dai_ly', 'option')) : while (have_rows('dai_ly', 'option')): the_row();
							$ten = get_sub_field('ten');
							$dia_chi = get_sub_field('dia_chi');
							$dien_thoai = get_sub_field('dien_thoai');
	                ?>
						<div class="col-sm-6 dai-ly-item">
							<div class="dai-ly-inner">
								<h3 class="dai-ly-title">
									<?php echo $ten; ?>
								</h3>
								<p><?php echo $dia_chi; ?></p>
								<p><?php echo $dien_thoai; ?></p>
							</div>
						</div>
	                <?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/main.js"></script>
	<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85514834-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
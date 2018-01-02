<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>
		<?php 
			wp_title('|', true,'right');
			bloginfo('name');
		?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
        <meta name="keywords" content="Gas petrolimex,đại lý gas petrolimex,gas petrolimex mỹ đình,gas petrolimex cầu giấy,đại lý gas"/>
	<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.ico" type="image/x-icon">
	<?php wp_head();?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/owl.carousel.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/responsive.css" />
</head>
<a href="http://www.dmca.com/Protection/Status.aspx?ID=c2558a64-201d-4998-83bc-cb1cd92d53eb" title="DMCA.com Protection Status" class="dmca-badge"> <img src="//images.dmca.com/Badges/dmca_protected_sml_120b.png?ID=c2558a64-201d-4998-83bc-cb1cd92d53eb" alt="DMCA.com Protection Status"></a> <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
<script type='text/javascript' src='//f.fff.com.vn/aui.js?_key=8vDS5M9oQ0p2W' async='async' > </script>
<!-- Google Code dành cho Thẻ tiếp thị lại -->
<!--------------------------------------------------
Không thể liên kết thẻ tiếp thị lại với thông tin nhận dạng cá nhân hay đặt thẻ tiếp thị lại trên các trang có liên quan đến danh mục nhạy cảm. Xem thêm thông tin và hướng dẫn về cách thiết lập thẻ trên: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 881949509;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/881949509/?guid=ON&amp;script=0"/>
</div>
</noscript>

<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",57389]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>

<body <?php body_class(); ?>>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<header id="header">
		<div class="header-top">
			<div class="container">
				<div class="fleft logo">
					<?php
						$logo = get_field('logo', 'option');
					?>
					<a href="<?php echo site_url(); ?>"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" /></a>
				</div>
				<div class="fright hotline">
					<p class="hotline-icon"><i class="fa fa-phone" aria-hidden="true"></i></p>
					<p><font size="+1">TỔNG ĐÀI GỌI GAS</font></p>
					<span><?php the_field('hotline', 'option'); ?></span>
				</div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="container">
				<button class="view-menu"><i class="fa fa-list"></i></button>
				<button class="view-search"><span class="fa fa-search"></span></button>
				<div class="fleft main-menu">
					<?php wp_nav_menu(array('theme_location'=>'main-menu', 'container'=>'')); ?>
				</div>
				<div class="fright search-box">
					<?php echo get_search_form(); ?>
				</div>
			</div>
		</div>
</header>
<!-- end header -->

	<?php
		if(!is_front_page()) {
	?>
		<div class="container">
			<div class="breadcrumb">
				<?php bcn_display(); ?>
			</div>
			
		</div>
	<?php } ?>

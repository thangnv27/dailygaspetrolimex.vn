jQuery(document).ready(function($){
	if (window.matchMedia('(max-width: 480px)').matches) {
		
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Form Focus
	/* ---------------------------------------------------------------------- */
	/*
	$("input[type='text'], input[type='email'], input[type='tel'], input[type='password'], textarea").on('focus', function(){
		var place = $(this).attr('placeholder');
		$(this).attr('data-place', place);
		$(this).attr('placeholder', '');
	});
	$("input[type='text'], input[type='email'], input[type='tel'], input[type='password'], textarea").on('blur', function(){
		$(this).attr('placeholder', $(this).attr('data-place'));
	});
	*/

	/* ---------------------------------------------------------------------- */
	/*	View Menu
	/* ---------------------------------------------------------------------- */
	$('.view-menu').on('click', function(e){
		if($('.main-menu').is(':hidden')){
			$('.main-menu').slideDown();
			$(this).html('<i class="fa fa-times"></i>');
		}else{
			$('.main-menu').slideUp();
			$(this).html('<i class="fa fa-list"></i>');
		}
	});
	
	/* ---------------------------------------------------------------------- */
	/*	View Menu Sub
	/* ---------------------------------------------------------------------- */
	$('.main-menu li.menu-item-has-children > a').append('<span class="view-sub-menu"><i class="fa fa-chevron-down"></i></span>');
	$('.view-sub-menu').on('click', function(e){
		e.preventDefault();
		var subMenu = $(this).parents('li').find('ul');
		if($(subMenu).is(':hidden')){
			$(subMenu).slideDown();
			$(this).html('<i class="fa fa-chevron-up"></i>');
		}else{
			$(subMenu).slideUp();
			$(this).html('<i class="fa fa-chevron-down"></i>');
		}
	});
	
	/* ---------------------------------------------------------------------- */
	/*	View Search
	/* ---------------------------------------------------------------------- */
	$('.view-search').on('click', function(e){
		$('.search-box').slideToggle();
	});

	/* ---------------------------------------------------------------------- */
	/*	Zing Tab
	/* ---------------------------------------------------------------------- */
	$('.tab-header a').on('click', function(e){
		e.preventDefault();
		var id = $(this).attr('href');
		$('.tab-header a').removeClass('active');
		$(this).addClass('active');
		$('.tab-content .tab').hide();
		$('.tab-content '+id).fadeIn();
	});
	
});
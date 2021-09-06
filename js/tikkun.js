jQuery(document).ready(function($) {

	if ($(window).width() <= 768) {
		var mobilecat = '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children dropdown menu-item-34845"><a href="#" class="dropdown-toggle">Browse By Category <b class="caret"></b></a>' +
		'<ul class="dropdown-menu">' +
		$('#topics-bar').html() + 
		'</ul></li>';

		$('#sticky-nav .container .nav-shelf .nav').append(mobilecat);
	}

	$('.homepage-slider').fadeTo(2000, 1);

	$('.countdown-content').hide();
	$('.countdown-content:first').show();
	$('.countdown-tabs li:first').addClass('active');
	$('.countdown-tabs li').click(function(event) {
	   	$('.countdown-tabs li').removeClass('active');
	    $(this).addClass('active');
	    $('.countdown-content').hide();

	    var selectTab = $(this).attr("data-tab");

	    $(selectTab).show();
	});

	var divs = $("#home-category-grid .tikkun-posts-by-top-tag, #rabbi-lerner-books .widget_media_image");
		for(var i = 0; i < divs.length; i+=3) {
		  divs.slice(i, i+3).wrapAll('<div class="row-fluid clearfix"></div>');
		}

	var strategydivs = $("#home-three-strategies .row-fluid aside");
		for(var i = 0; i < strategydivs.length; i+=2) {
		  strategydivs.slice(i, i+2).wrapAll('<div class="span4"></div>');
		}

	$("#home-how-to-activist aside.widget-5").after('</div><div class="row-fluid">');

});
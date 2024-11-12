(function ($, window) {
	// Open and close the mobile menu
	$(".header .header__toggleItem").on("click", function () {
		menu_open_sp();
	});

	$(".mainBodyContent").on("click", function () {
		if (!$(this).hasClass("menu__openSp")) return;
		menu_open_sp();
	});

	function menu_open_sp() {
		$("body").toggleClass("mobile-menu-open");
		$(".header__menusp").toggleClass("active");
		$(".header__toggleItem").toggle();
		$(".mainBodyContent").toggleClass("menu__openSp");
	}

	$(".menu-item-has-children > .dropdown-arrow").click(function (e) {
		e.preventDefault();
		var $submenu = $(this).siblings(".sub-menu");

		if ($submenu.length) {
			$submenu.stop(true, true).slideToggle();
			$(this).parent().toggleClass("open");
			$(".sub-menu").not($submenu).slideUp();
			$(".menu-item-has-children").not($(this).parent()).removeClass("open");
		}
	});
	// end mobile menu

	// wpadminbar
	if ($("#wpadminbar").length > 0) {
		$(".header").css("margin-top", $("#wpadminbar").outerHeight(true));
	}

	function adjustPadding() {
		$("body").css("padding-top", $("#header").outerHeight(true));
	}

	adjustPadding();
	$(window).resize(adjustPadding);

	// Banner
	$(".sectionBanner__slider").slick({
		dots: true,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 5000,
	});

	// video url
	if ($("#videoUrl").length) {
		let videoSrc = "";
		let videoId = $("#video");
		let videoUrl = $("#videoUrl");

		// Add click event for each .videoBlock__playAction
		$(document).on("click", ".videoBlock__playAction", function (e) {
			e.preventDefault();
			videoSrc = $(this).data("src");
		});

		videoUrl.on("shown.bs.modal", function (e) {
			videoId.attr("src", videoSrc + "?autoplay=1&mute=1&modestbranding=1&showinfo=0");
		});

		videoUrl.on("hide.bs.modal", function (e) {
			videoId.attr("src", "");
			videoSrc = "";
		});
	}

	// video customer
	$(".video_customer_slider").slick({
		dots: false,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 3000,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
	});
})(jQuery, window);

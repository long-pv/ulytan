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

	$(document).on("click", "ul.menu > .menu-item-has-children > .dropdown-arrow", function (e) {
		e.preventDefault();
		var $submenu = $(this).siblings(".sub-menu");

		if ($submenu.length) {
			$submenu.stop(true, true).slideToggle();
			$(this).parent().toggleClass("open");
			$("ul.menu > li > .sub-menu").not($submenu).slideUp();
			$("ul.menu > .menu-item-has-children").not($(this).parent()).removeClass("open");
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
		adaptiveHeight: true,
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

	$("#sticky-navigator").stickyNavigator({
		wrapselector: ".single_post_editor",
		targetselector: "h2,h3",
	});
	$("#sticky-nav-mb").stickyNavigator({
		wrapselector: ".single_post_editor",
		targetselector: "h2,h3",
	});

	// Kiểm tra form bình luận khi submit
	$("#commentform").submit(function (e) {
		var isValid = true;

		// Kiểm tra trường Tên
		var name = $("#author").val();
		if (name.trim() == "") {
			isValid = false;
			alert("Vui lòng nhập tên!");
		}

		var name = $("#phone").val();
		if (name.trim() == "") {
			isValid = false;
			$("#email").val("");
			alert("Vui lòng nhập số điện thoại!");
		} else {
			$("#email").val(name + "@gmail.com");
		}

		// Kiểm tra trường Email
		// var email = $("#email").val("user_post@gmail.com");
		// var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
		// if (email.trim() == "") {
		// 	isValid = false;
		// 	alert("Vui lòng nhập email!");
		// }
		// else if (!emailPattern.test(email)) {
		// 	isValid = false;
		// 	alert("Email không hợp lệ!");
		// }

		// Kiểm tra trường Bình luận
		var comment = $("#comment").val();
		if (comment.trim() == "") {
			isValid = false;
			alert("Vui lòng nhập bình luận!");
		}

		// Nếu không hợp lệ, ngừng gửi form
		if (!isValid) {
			e.preventDefault();
		}
	});

	$("#searchInput").on("input", function () {
		var searchText = $(this).val().toLowerCase();

		// Duyệt qua tất cả các accordion-item
		$(".accordion .accordion__item").each(function () {
			var questionText = $(this).find(".accordion__btn").text().toLowerCase(); // lấy văn bản từ .accordion__btn
			var answerText = $(this).find(".accordion__body").text().toLowerCase(); // lấy văn bản từ .accordion__body

			// Kiểm tra nếu văn bản tìm kiếm tồn tại trong .accordion__btn hoặc .accordion__body
			if (questionText.includes(searchText) || answerText.includes(searchText)) {
				$(this).show();
			} else {
				$(this).hide();
			}
		});
	});

	if ($(".single_toc_mb").length > 0) {
		$(".single_toc_btn").on("click", function () {
			$(".single_toc_content").toggle();
			$(this).toggleClass("active");
		});

		var $target = $(".single_toc_mb");
		var targetOffset = $target.offset().top;

		$(window).on("scroll", function () {
			var scrollTop = $(this).scrollTop();

			if (scrollTop >= targetOffset) {
				$target.addClass("scroll_active");
			} else {
				$target.removeClass("scroll_active");
			}
		});

		$(document).on("click", ".single_toc_mb .single_toc_content a", function () {
			$(this).parents(".single_toc_content").toggle();
		});
	}
})(jQuery, window);

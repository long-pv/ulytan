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

	$(document).on("click", "ul.menu > li > ul .menu-item-has-children > .dropdown-arrow", function (e) {
		e.preventDefault();
		var $submenu = $(this).siblings(".sub-menu");

		if ($submenu.length) {
			$submenu.stop(true, true).slideToggle();
			$(this).parent().toggleClass("open");
			$("ul.menu > li > ul > li > .sub-menu").not($submenu).slideUp();
			$("ul.menu > li > ul > .menu-item-has-children").not($(this).parent()).removeClass("open");
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

	// service_list_slider
	$(".service_list_slider").slick({
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

	// video customer
	$(".video_customer_slider").slick({
		dots: true,
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

	// project_list_slider
	$(".project_list_slider").slick({
		dots: true,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 3000,
		slidesToShow: 1,
		slidesToScroll: 1,
		centerMode: true,
		centerPadding: "25%", // Mỗi bên hiển thị nửa item
		infinite: true, // Vô hạn lặp
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerPadding: "25px", // Mỗi bên hiển thị nửa item
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

	var staffTeam = $(".staff_team");
	var staffTeamBtn = $(".staff_team_btn a");
	var itemsToShow = 8; // Số lượng phần tử hiển thị ban đầu

	function updateStaffTeamVisibility() {
		var totalItems = staffTeam.length;

		// Ẩn tất cả các phần tử
		staffTeam.hide();

		// Hiển thị chỉ các phần tử đầu tiên theo số lượng `itemsToShow`
		staffTeam.slice(0, itemsToShow).show();

		// Kiểm tra nếu tổng số phần tử <= itemsToShow, thì ẩn nút
		if (totalItems <= itemsToShow) {
			staffTeamBtn.hide();
		} else {
			staffTeamBtn.show();
		}
	}

	// Cập nhật hiển thị khi tải trang
	updateStaffTeamVisibility();

	// Sự kiện khi click vào nút
	staffTeamBtn.on("click", function (e) {
		e.preventDefault();

		// Hiển thị tất cả các phần tử
		staffTeam.show();

		// Ẩn nút
		staffTeamBtn.hide();
	});

	$(document).ready(function () {
		$(".contact_submit_fake").click(function (event) {
			event.preventDefault();
			$(".contact_submit_primary").trigger("click");
		});
	});

	$(".custom_dropdown_button").on("click", function (e) {
		e.stopPropagation();
		$(".custom_dropdown_button").removeClass("down_show");
		var dropdownMenu = $(this).next(".custom_dropdown_menu");
		$(".custom_dropdown_menu").not(dropdownMenu).hide();
		$(this).toggleClass("down_show");
		dropdownMenu.toggle();
	});

	$(document).on("click", function () {
		$(".custom_dropdown_menu").hide();
		$(".custom_dropdown_button").removeClass("down_show");
	});

	$(".custom_dropdown_menu").on("click", function (e) {
		e.stopPropagation();
	});

	jQuery(document).ready(function ($) {
		// Lắng nghe sự kiện DOM thay đổi
		const observer = new MutationObserver(function (mutationsList) {
			mutationsList.forEach(function (mutation) {
				$(mutation.addedNodes).each(function () {
					// Kiểm tra nếu phần tử mới thêm là `wpcf7-not-valid-tip`
					if ($(this).hasClass("wpcf7-not-valid-tip")) {
						var $error = $(this); // Phần tử thông báo lỗi
						var $dropdown = $error.closest(".custom_dropdown"); // Phần tử cha cần đặt thông báo lỗi bên dưới

						// Nếu thông báo lỗi nằm trong `custom_dropdown_menu`, di chuyển nó ra ngoài
						if ($dropdown.length && $error.closest(".custom_dropdown_menu").length) {
							$dropdown.append($error); // Di chuyển thông báo lỗi ra ngoài
						}
					}
				});
			});
		});

		// Chỉ theo dõi những thay đổi liên quan đến `wpcf7-not-valid-tip`
		$("footer .wpcf7-form").each(function () {
			observer.observe(this, {
				childList: true, // Theo dõi sự thêm hoặc bớt các phần tử con
				subtree: true, // Theo dõi các phần tử con bên trong
			});
		});

		// Xử lý khi form được submit
		$(document).on("submit", "footer .wpcf7-form", function (e) {
			var isValid = true;

			// Kiểm tra và di chuyển các thông báo lỗi (nếu có)
			$(".wpcf7-not-valid-tip").each(function () {
				var $error = $(this); // Phần tử thông báo lỗi
				var $dropdown = $error.closest(".custom_dropdown"); // Phần tử cha cần đặt thông báo lỗi bên dưới

				if ($dropdown.length && $error.closest(".custom_dropdown_menu").length) {
					$dropdown.append($error); // Di chuyển thông báo lỗi ra ngoài
				}

				// Nếu tồn tại thông báo lỗi, không cho form submit
				isValid = false;
			});

			// Ngăn không cho form thực hiện submit nếu có lỗi
			if (!isValid) {
				e.preventDefault();
			}
		});

		// Lắng nghe sự kiện thay đổi trên checkbox
		$(document).on("change", '.custom_dropdown_menu input[type="checkbox"]', function () {
			var $dropdown = $(this).closest(".custom_dropdown");
			var $error = $dropdown.find(".wpcf7-not-valid-tip");

			// Nếu có ít nhất một checkbox được chọn, xóa thông báo lỗi
			if ($dropdown.find('input[type="checkbox"]:checked').length > 0) {
				$error.remove();
			}
		});
	});

	document.addEventListener("DOMContentLoaded", function () {
		const form = document.querySelector(".wpcf7");
		if (form) {
			form.addEventListener("wpcf7invalid", function () {
				console.log("wpcf7invalid event triggered"); // Xác nhận sự kiện
				setTimeout(() => {
					// Lấy tất cả các thông báo lỗi
					const errors = form.querySelectorAll(".wpcf7-not-valid-tip");
					// console.log(errors);
					errors.forEach((error) => {
						const input = error.parentElement;
						console.log(input);
						if (input) {
							const name = input.getAttribute("data-name");
							// Thay đổi thông báo tùy chỉnh
							if (name === "footer-name") {
								error.textContent = "Vui lòng nhập họ và tên của bạn.";
							} else if (name === "footer-email") {
								error.textContent = "Vui lòng nhập email hợp lệ.";
							} else if (name === "footer-phone") {
								error.textContent = "Vui lòng nhập số điện thoại của bạn.";
							} else if (name === "footer-country") {
								error.textContent = "Vui lòng chọn quốc gia.";
							} else if (name === "footer-service") {
								error.textContent = "Vui lòng chọn ít nhất một dịch vụ.";
							}
						}
					});
				}, 100); // Thời gian chờ để đảm bảo các thông báo lỗi mặc định đã được áp dụng.
			});
		}
	});

	jQuery(document).ready(function ($) {
		setTimeout(function () {
			$(".custom_dropdown_service .wpcf7-checkbox label .wpcf7-list-item-label").each(function () {
				var text = $(this).text();
				// Gắn HTML lại, chèn <br> giữa phần đầu và phần cuối
				$(this).html("<strong>" + text.split("(")[0].trim() + "</strong><br><em>(" + text.split("(")[1]);
			});
		}, 1000);
	});

	jQuery(document).ready(function ($) {
		// Lắng nghe sự kiện wpcf7mailsent
		$(document).on("wpcf7mailsent", function (event) {
			// Kiểm tra nếu form nằm trong thẻ div có class 'footer-form-wrapper'
			if ($(event.target).closest(".footer_form").length > 0) {
				// Kích hoạt modal Bootstrap
				$("#modal_form_footer").modal("show");
			}
		});
	});

	jQuery(document).ready(function ($) {
		// Đảm bảo phần tử được ẩn khi xuất hiện
		setInterval(function () {
			$(".grecaptcha-badge").css("display", "none");
		}, 500);
	});

	jQuery(document).ready(function ($) {
		// Chờ phần tử xuất hiện và ẩn nó
		var observer = new MutationObserver(function () {
			$(".grecaptcha-badge").hide();
		});

		// Theo dõi sự thay đổi của body
		observer.observe(document.body, {
			childList: true,
			subtree: true,
		});
	});

	// slider Đối tác của chúng tôi
	function addCustomSlickAttributes() {
		$(".doi_tac_ulytan_slider [data-my-slick-attr]").removeAttr("data-my-slick-attr");

		$(".doi_tac_ulytan_slider .slick-active").each(function (index, el) {
			$(el).attr("data-my-slick-attr", index);
		});
	}

	$(".doi_tac_ulytan_slider").on("init", function (event, slick) {
		addCustomSlickAttributes();
	});

	$(".doi_tac_ulytan_slider").slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		dots: false,
		autoplay: true,
		autoplaySpeed: 2000,
		centerMode: true,
		centerPadding: "0px",

		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: false,
				},
			},
		],
	});

	$(".doi_tac_ulytan_slider").on("afterChange", function (event, slick, current_slide_index, next_slide_index) {
		addCustomSlickAttributes();
	});
	// end

	$(".staff_btn_xem_them").on("click", function () {
		$(this).parents(".staff_section").find(".staff_item").removeClass("d-none");
		$(this).hide();
	});

	$(".hinh_anh_hoat_dong_btn").on("click", function () {
		$(this).parents(".hinh_anh_hoat_dong").find(".hinh_anh_hoat_dong_col").removeClass("d-none");
		$(this).hide();
	});

	$(".video_hoat_dong_slider").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		arrows: true,
		autoplaySpeed: 5000,
	});
})(jQuery, window);

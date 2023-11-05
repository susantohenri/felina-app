$(document).ready(function () {
	new ClipboardJS('.clipboard');

	$('#settings-form').submit(function (e) {
		var self = this;
		$(this).find('button').html('<i class="fa fa-spinner pr-2"></i> Saving').prop('disabled', true);
		var url = $(this).attr('action');
		var data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: url,
			data: data,
			dataType: 'json',
			success: function (response) {
				if (response.status == 'success') {
					$('#partner-details-alert').removeClass('alert-danger').addClass('d-block alert-success').text('Data have been saved successfully');
					$('#first_name_label').addClass('hide').html('');
					$('#last_name_label').addClass('hide').html('');
					$('#adress_label').addClass('hide').html('');
					$('#city_label').addClass('hide').html('');
					$('#country_label').addClass('hide').html('');
					$('#postal_label').addClass('hide').html('');
				} else {
					$('#partner-details-alert').removeClass('alert-success').addClass('d-block alert-danger').html(response.errors.join('<br />'));
					if (response.error_fname) {
						$('#first_name_label').removeClass('hide').html(response.error_fname);
					} else {
						$('#first_name_label').addClass('hide').html('');
					}
					if (response.error_lname) {
						$('#last_name_label').removeClass('hide').html(response.error_lname);
					} else {
						$('#last_name_label').addClass('hide').html('');
					}
					if (response.error_aline) {
						$('#adress_label').removeClass('hide').html(response.error_aline);
					} else {
						$('#adress_label').addClass('hide').html('');
					}
					if (response.error_city) {
						$('#city_label').removeClass('hide').html(response.error_city);
					} else {
						$('#city_label').addClass('hide').html('');
					}
					if (response.error_country) {
						$('#country_label').removeClass('hide').html(response.error_country);
					} else {
						$('#country_label').addClass('hide').html('');
					}
					if (response.error_pcode) {
						$('#postal_label').removeClass('hide').html(response.error_pcode);
					} else {
						$('#postal_label').addClass('hide').html('');
					}
				}

				$(self).find('button').html('<i class="fa fa-check pr-2"></i> Save Changes').prop('disabled', false);
			}
		});
		e.preventDefault();
	});

	$('#change-password-form').submit(function (e) {
		var self = this;
		$(this).find('button').html('<i class="fa fa-spinner pr-2"></i> Saving').prop('disabled', true);
		var url = $(this).attr('action');
		var data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: url,
			data: data,
			dataType: 'json',
			success: function (response) {
				if (response.status == 'success') {
					$('#partner-change-password-alert').removeClass('alert-danger').addClass('d-block alert-success').text('Password has been saved successfully');
				} else {
					$('#partner-change-password-alert').removeClass('alert-success').addClass('d-block alert-danger').html(response.errors.join('<br />'));
				}

				$(self).find('button').html('<i class="fa fa-check pr-2"></i> Save Changes').prop('disabled', false);
			}
		});
		e.preventDefault();
	});
	$(".lang-menu li").on("click", function (e) {
		var pageType = $(this).attr('data-attr');
		sessionUrl = site_url + '/wp-content/plugins/lingoni-app/session.php';
		$.ajax({
			url: sessionUrl,
			data: {
				lang: pageType,
			},
			type: 'POST',
			beforeSend: function (xhr) {
			},
			success: function (data) {
				console.log(data);
			}
		});
	});
	$(".l_m_nav_item.parent-link").on("click", function () {
		var submenu = $(this).find(".sub-menu").toggleClass("active");
		$(".l_m_nav_item.active_menu").toggleClass("hidden_active");
		$(this).toggleClass('active_menu');
		$(this).removeClass('hidden_active');
	});

	if (null != (new URLSearchParams(window.location.search)).get(`p`) && -1 < (new URLSearchParams(window.location.search)).get(`p`).indexOf(`-pronunciation`) && 0 < $(`.pronunciation-title`).length) {
		var pronunciation_next_button = $(`.pronunciation-next-button`)
		var next_button_wording = pronunciation_next_button.html()
		load_pronunciation()
		pronunciation_next_button.click(load_pronunciation)
		function load_pronunciation() {
			pronunciation_next_button.html(`PLEASE WAIT`)
			$(`.mdp-reset-rec-btn`).click()
			$(`.mdp-reset-rec-yes`).click()
			var exclude_id = pronunciation_next_button.attr(`current-pronunciation-id`)
			$.get(`${site_url}/wp-json/lingoni-app/v1/pronunciation`, { course_id, exclude_id }, function (response) {
				$(`.pronunciation-title`).html(response.title)
				$(`.pronunciation-audio`).html(response.audio)
				$(`.pronunciation-image`).html(response.image)
				pronunciation_next_button.attr(`current-pronunciation-id`, response.ID)
				pronunciation_next_button.html(next_button_wording)
			}).fail(() => {
				pronunciation_next_button.html(`PLEASE REFRESH`)
			})
		}
	}

	if (jQuery(`[href$="-subscription"]`).length > 0) {
		var menu_subscription_language = jQuery(`[href$="-subscription"]`).attr(`href`).replace(`-subscription`, ``).replace(`?p=`, ``)
		var menu_subscription_user_key = jQuery(`[data-user-key]`).attr(`data-user-key`)
		var menu_subscription_wording = jQuery(`[href$="-subscription"] > span`).html()
		$.get(`${site_url}/wp-json/lingoni-app/v1/specific-subscription`, { menu_subscription_language, menu_subscription_user_key }, function (response) {
			if ('' !== response) jQuery(`[href$="-subscription"] > span`).html(response)
		}).fail(function () {
			jQuery(`[href$="-subscription"] > span`).html(menu_subscription_wording)
		})
	}
});
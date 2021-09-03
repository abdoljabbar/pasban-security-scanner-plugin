(function($) {
    'use strict';

    $('document').ready(function() {
        $('.ready-button').on('click', function(e) {

            $('.pasban-ready-message').slideUp('slow');

            var data = {
                action: 'pasban_start_scan_action',
                nonce: scan_variable.nonce,
            };
            $.post(ajaxurl, data, function(response) {
                let element = `<h3 class="progress-title">${response.data.title}<span class="result-passed"></span></h3>
				<div class="progress">
					<div class="progress-bar  progress-bar-striped active"></div>
				</div>`;
                $('.pasban-scan-result-elements').append(element);
                $('.progress-bar').addClass('progress-bar-danger');
                $('.pasban-scan-result').show();

                $('.progress-bar').css('width', '100%');

                $('.progress-bar').on('animationend', function() {
                    if (response.data.status) {
                        $('.result-passed').addClass('passed');
                        $('.result-passed').text(' - Passed');
                    } else {
                        $('.result-passed').addClass('failed');
                        $('.result-passed').text(' - Failed');
                    }
                });

            });
        })
    });

})(jQuery);

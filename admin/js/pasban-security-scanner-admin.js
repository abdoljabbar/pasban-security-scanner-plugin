(function($) {
    'use strict';

    $('document').ready(function() {
        $('.ready-button').on('click', function(e) {
            var data = {
                action: 'pasban_start_scan_action',
                nonce: scan_variable.nonce,
            };
            $.post(ajaxurl, data, function(response) {
                alert("Response: " + response);
            });
        })
    });

})(jQuery);

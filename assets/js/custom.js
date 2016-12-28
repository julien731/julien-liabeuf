(function ($) {

    "use strict";

    /* FIT VIDEOS WITH SCREEN SIZE */
    $(".video-player").fitVids();

    // Get the contact form
    var $contactForm = $('#contact-form');
    var $contactFormWrapper = $('#contact-form-wrapper');

    // Intercept contact form submission
    $contactForm.submit(function(e) {

        // Prevent default form submission
        e.preventDefault();

        // Disable the submit button to avoid re-submission
        document.getElementById("contact-form-submit").disabled = true;
        document.getElementById("contact-form-submit").value = "Sending...";

        $.ajax({
            url: '//formspree.io/julien@liabeuf.fr',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
                $contactFormWrapper.append('<div class="alert alert--loading alert-info" role="alert">Sending message. Please wait for just a second...</div>');
            },
            success: function(data) {
                $contactFormWrapper.find('.alert--loading').hide();
                $contactForm.hide();
                $contactFormWrapper.append('<div class="alert alert-success" role="alert">Message sent! Thanks for getting in touch, I will get back to you asap :)</div>');
            },
            error: function(err) {

                // Re-enable the submit button
                document.getElementById("contact-form-submit").disabled = false;
                document.getElementById("contact-form-submit").value = "Send";

                $contactFormWrapper.find('.alert--loading').hide();
                $contactFormWrapper.append('<div class="alert alert-danger" role="alert">Ops, there was an error. Would you mind trying again?</div>');
            }
        });
    });

})(jQuery);
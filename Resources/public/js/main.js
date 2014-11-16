(function ($) {
    function initBookingModal() {
        $('.booking-form').submit(function (e) {
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: postData,
                    success: function (data, textStatus, jqXHR) {
                        $('.modal-content').html(data);

                        initBookingModal();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //if fails
                    }
                });
            e.preventDefault(); //STOP default action
            e.unbind(); //unbind. to stop multiple form submit.
        });
    }

    $('[data-target=modal]').on('click', function () {
        console.info(this);

        $.get($(this).attr('href'), function (data) {
            $('.modal-content').html(data);

            $('.modal').modal();

            initBookingModal();
        });

        return false;
    });
})(jQuery);
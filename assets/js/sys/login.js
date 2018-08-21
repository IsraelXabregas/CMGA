$(document).ajaxStart(function () {
    $(".ajax-loader").removeClass("hidden");
});
$(document).ajaxStop(function () {
    $(".ajax-loader").addClass("hidden");
});

$(document).ready(function () {
    $("#formLogin").submit(function (e) {
        e.preventDefault();
        var form = $(this);

        $(".text-danger").remove();

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.success == true) {
                    window.location = data.messages;
                } else {
                    if (data.messages instanceof Object) {
                        $.each(data.messages, function (index, value) {
                            var element = $("#" + index);

                            $(element)
                                .closest('.form-group')
                                .removeClass('has-error')
                                .removeClass('has-success')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success');
                            $(element).after(value);
                        });
                    } else {
                        $(".messages").html('<div class="alert fade in alert-danger alert-dismissible" role="alert">' +
                            '<span class="glyphicon glyphicon-remove-sign"></span>' + data.messages +
                            '</div>').fadeIn().delay(3000).fadeOut('slow');

                        $(".text-danger").remove();
                        $(".form-group").removeClass('has-error').removeClass('has-success');
                    }
                }
            }        // END SUCCESS FUNCTION
        });
        return false;
    });
});

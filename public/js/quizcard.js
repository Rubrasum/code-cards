jQuery(document).ready(function($){
    var user_id = jQuery("#user_id").val();
    console.log(user_id);

    Echo.channel(`quizcard.`+ user_id)
        .listen('QuizCardStored', (e) => {
            console.log("Hey look at you Jerry.");
        });



    //----- Open model CREATE -----//
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');
    });

    // CREATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') // btw don't understand this or if it needs updating for api
            }
        });
        e.preventDefault();
        var formData = {
            user_id: jQuery('#user_id').val(),
            deck: jQuery('#deck').val(),
            parent: jQuery('#parent').val(),
            type: jQuery('#type').val(),
            data_string_1: jQuery('#data_string_1').val(),
            data_string_2: jQuery('#data_string_2').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var quizcard_id = jQuery('#quizcard_id').val();
        var ajaxurl = '/api/quizcards';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var quizcard = '<tr id="quizcard' + data.id + '">' +
                    '<td>' + data.deck + '</td>' +
                    '<td>' + data.parent + '</td>' +
                    '<td>' + data.type + '</td>' +
                    '<td>' + data.data_string_1 + '</td>' +
                    '<td>' + data.data_string_2 + '</td>';
                if (state === "add") {
                    jQuery('#quizcard-list').append(quizcard);
                } else {
                    jQuery("#quizcard" + quizcard_id).replaceWith(quizcard);
                }
                jQuery('#myForm').trigger("reset");
                jQuery('#formModal').modal('hide')
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});

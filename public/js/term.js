jQuery(document).ready(function($){

    //----- Open model CREATE -----//
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');
    });

    // CREATE
    $("#btn-save").click(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            start: jQuery('#start').val(),
            end: jQuery('#end').val(),
            name: jQuery('#name').val(),
            description: jQuery('#description').val(),
            active: jQuery('#active').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var terms_id = jQuery('#terms_id').val();
        var ajaxurl = 'terms';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var term = '<tr id="term' + data.id + '"><td>' + data.id + '</td><td>' + data.start + '</td><td>' + data.end + '</td><td>' + data.name + '</td><td>' + data.description + '</td><td>' + data.active + '</td>';
                if (state == "add") {
                    jQuery('#term-list').append(term);
                } else {
                    jQuery("#term" + terms_id).replaceWith(term);
                }
                jQuery('#myForm').trigger("reset");
                jQuery('#formModal').modal('hide')
            },
            error: function (data) {
                alert(JSON.stringify(data));
            }
        });
    });
});
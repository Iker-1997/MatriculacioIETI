jQuery(document).ready(function($){
    ////----- Open the modal to CREATE a link -----////
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#modalFormData').trigger("reset");
        jQuery('#linkEditorModal').modal('show');
    });
 
    ////----- Open the modal to UPDATE a link -----////
    jQuery('body').on('click', '.open-modal', function () {
        var ufs_id = $(this).val();
        $.get('links/' + ufs_id, function (data) {
            jQuery('#link_id').val(data.id);
            jQuery('#link').val(data.mp_id);
            jQuery('#description').val(data.name_uf);
            jQuery('#btn-save').val("update");
            jQuery('#linkEditorModal').modal('show');
        })
    });
 
    // Clicking the save button on the open modal for both CREATE and UPDATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            mp_id: jQuery('#link').val(),
            name_uf: jQuery('#description').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var ufs_id = jQuery('#link_id').val();
        var ajaxurl = 'ufs';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'ufs/' + ufs_id;
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var link = '<tr id="link' + data.id + '"><td>' + data.id + '</td><td>' + data.mp_id + '</td><td>' + data.name_uf + '</td>';
                link += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Edit</button>&nbsp;';
                link += '<button class="btn btn-danger delete-link" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") {
                    jQuery('#links-list').append(link);
                } else {
                    $("#link" + ufs_id).replaceWith(link);
                }
                jQuery('#modalFormData').trigger("reset");
                jQuery('#linkEditorModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
 
    ////----- DELETE a link and remove from the page -----////
    jQuery('.delete-link').click(function () {
        var ufs_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: 'ufs/' + ufs_id,
            success: function (data) {
                console.log(data);
                $("#link" + ufs_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
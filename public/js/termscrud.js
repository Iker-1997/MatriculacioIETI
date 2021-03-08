    // Pass csrf token in ajax header
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


//----- [ button click function ] ----------
    $("#createBtn").click(function(event) {
        event.preventDefault();
        $(".error").remove();
        $(".alert").remove();

        var start       =       $("#start").val();
        var end         =       $("#end").val();
        var name        =       $("#name").val();
        var description =       $("#description").val();
        var active      =       $("#active").val();

        if(start == "") {
            $("#start").after('<span class="text-danger error"> Start is required </span>');

        }

        if(end == "") {
            $("#end").after('<span class="text-danger error"> End is required </span>');
        }

        if(name == "") {
            $("#name").after('<span class="text-danger error"> Name is required </span>');
        }

        if(description == "") {
            $("#description").after('<span class="text-danger error"> Description is required </span>');
        }

        if(active == "") {
            $("#active").after('<span class="text-danger error"> Active is required </span>');
            return false;
        }

        var form_data   =       $("#termsForm").serialize();

        // if terms id exist
        if($("#id_hidden").val() !="") {
            updatePost(form_data);
        }

        // else create terms
        else {
            createPost(form_data);
        }
    });


    // create new terms
    function createTerms(form_data) {
        $.ajax({
            url: 'terms',
            method: 'post',
            data: form_data,
            dataType: 'json',

            beforeSend:function() {
                $("#createBtn").addClass("disabled");
                $("#createBtn").text("Processing..");
            },

            success:function(res) {
                $("#createBtn").removeClass("disabled");
                $("#createBtn").text("Save");

                if(res.status == "success") {
                    $(".result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message+ "</div>");
                }

                else if(res.status == "failed") {
                    $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message+ "</div>");
                }
            }
        });
    }

    // update terms
    function updateTerms(form_data) {
        $.ajax({
            url: 'terms',
            method: 'put',
            data: form_data,
            dataType: 'json',

            beforeSend:function() {
                $("#createBtn").addClass("disabled");
                $("#createBtn").text("Processing..");
            },

            success:function(res) {
                $("#createBtn").removeClass("disabled");
                $("#createBtn").text("Update");

                if(res.status == "success") {
                    $(".result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message+ "</div>");
                }

                else if(res.status == "failed") {
                    $(".result").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message+ "</div>");
                }
            }
        });
    }

    // ---------- [ Delete post ] ----------------
    function deleteTerms(term_id) {
        var status = confirm("Do you want to delete this terms?");
        if(status == true) {
            $.ajax({
                url: "terms/"+term_id,
                method: 'delete',
                dataType: 'json',

                success:function(res) {
                    if(res.status == "success") {
                        $("#result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                    }
                    else if(res.status == "failed") {
                        $("#result").html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button>" + res.message + "</div>");
                    }
                }
            });
        }
    }

$('#addTermsModal').on('shown.bs.modal', function (e) {
    var id            =   $(e.relatedTarget).data('id');
    var start         =   $(e.relatedTarget).data('start');
    var end           =   $(e.relatedTarget).data('end');
    var name          =   $(e.relatedTarget).data('name');
    var description   =   $(e.relatedTarget).data('description');
    var active        =   $(e.relatedTarget).data('active');
    var action        =   $(e.relatedTarget).data('action');

   if(action !== undefined) {
        if(action === "view") {

            // set modal title
            $(".modal-title").html("Terms Detail");

            // pass data to input fields
            $("#start").attr("readonly", "true");
            $("#start").val(start);

            $("#end").attr("readonly", "true");
            $("#end").val(end);

            $("#name").attr("readonly", "true");
            $("#name").val(name);

            $("#description").attr("readonly", "true");
            $("#description").val(description);

            $("#active").attr("readonly", "true");
            $("#active").val(active);

            // hide button
            $("#createBtn").addClass("d-none");
        }


        if(action === "edit") {
            $("#start").removeAttr("readonly");
            $("#end").removeAttr("readonly");
            $("#name").removeAttr("readonly");
            $("#description").removeAttr("readonly");
            $("#active").removeAttr("readonly");


            // set modal title
            $(".modal-title").html("Update Terms");

            $("#createBtn").text("Update");

             // pass data to input fields
              $("#id_hidden").val(id);
              $("#start").val(start);
              $("#end").val(end);
              $("#name").val(name);
              $("#description").val(description);
              $("#active").val(active);


             // hide button
            $("#createBtn").removeClass("d-none");
        }
   }

   else {
        $(".modal-title").html("Create Terms");

        // pass data to input fields
        $("#start").removeAttr("readonly");
        $("#start").val("");

        $("#end").removeAttr("readonly");
        $("#end").val("");

        $("#name").removeAttr("readonly");
        $("#name").val("");

        $("#description").removeAttr("readonly");
        $("#description").val("");

        $("#active").removeAttr("readonly");
        $("#active").val("");

        // hide button
        $("#createBtn").removeClass("d-none");
   }
});
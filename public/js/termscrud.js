$(document).ready(function($){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#addNewterm').click(function () {
       $('#addEdittermForm').trigger("reset");
       $('#ajaxtermModel').html("Add Term");
       $('#ajax-term-model').modal('show');
    });

    $('body').on('click', '.edit', function () {
        if (confirm("Edit Record?") == true) {
            var id = $(this).data('id');
        // ajax
        $.ajax({
            type:"PUT",
            url: "/admin/terms/"+id,
            data: { id:id },
            dataType: 'json',
            }).done( function(res){
              $('#ajaxtermModel').html("Edit Terms");
              $('#ajax-term-model').modal('show');
              $('#id').val(res.id);
              $('#start').val(res.start);
              $('#end').val(res.end);
              $('#name').val(res.name);
              $('#description').val(res.description);
              $('#active').val(res.active);
              alert("success!");
            }).fail( function(res) {
              alert("fail!");
          });
        }
    });

    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var name = $(this).data('name');
        var id = $(this).data('id');
        // ajax
        $.ajax({
            type:"DELETE",
            url: "/admin/terms/"+id,
            data: { id: id },
            data: { name: name },
            dataType: 'json',
          }).done( function(res){
              alert("success!");
              window.location.reload();
          }).fail( function(res) {
              alert("fail!");
          });

       }
    });

    $('body').on('click', '#btn-save', function (event) {
        if (confirm("Create Record?") == true) {
            var id = $("#id").val();
            var start = $("#start").val();
            var end = $("#end").val();
            var name = $("#name").val();
            var description = $("#description").val();
            var active = $("#active").val();
            $("#btn-save").html('Please Wait...');
            $("#btn-save"). attr("disabled", true);
        // ajax
        $.ajax({
            type:"POST",
            url: "/admin/terms/",
            data: {
              id:id,
              start:start,
              end:end,
              name:name,
              description:description,
              active:active},
            dataType: 'json',
            }).done( function(res){
              alert("success!");
                $("#btn-save").html('Submit');
                $("#btn-save"). attr("disabled", false);
              window.location.reload();
          }).fail( function(res) {
              alert("fail!");
          });
        }
    });
});

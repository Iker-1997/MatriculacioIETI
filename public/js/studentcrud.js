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

    $(document).on("click", ".edit" , function() {
      var edit_id = $(this).data('id');
      var name = $('#name_'+edit_id).val();
      var description = $('#description'+edit_id).val();
      if(name != '' && description != ''){
        $.ajax({
          url: "/admin/terms/"+edit_id,
          type: 'put',
          data: {editid: edit_id,name: name,description: description},
          }).done( function(res){
              alert("success!");
              window.location.reload();
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

    $(".btn-submit").click(function(e){
  
        e.preventDefault();
   
        var name = $("input[name=name]").val();
        var description = $("input[name=description]").val();
        var start = $("input[name=start]").val();
        var end = $("input[name=end]").val();
   
        $.ajax({
           type:'POST',
           url:"/admin/terms/",
           data:{name:name, description:description, start:start, end:end},
           success:function(data){
              alert(data.success);
           }
        });
  
    });
    /*
    $('body').on('click', '#btn-save', function (event) {
            var id = $("#id").val();
            var start = $("#start").val();
            var end = $("#end").val();
            var name = $("#name").val();
            var description = $("#description").val();
            var active = $("#active").val();
            $("#btn-save").html('Please Wait...');
            $("#btn-save"). attr("disabled", true);
        $.ajax({
            type:"POST",
            url: "/admin/terms/",
            data: {
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
    });
    */
});
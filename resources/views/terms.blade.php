<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 8 Ajax CRUD Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Terms</h2>
        </div>
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewterm" class="btn btn-success">Add</button></div>
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Start</th>
                  <th scope="col">End</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Active</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody> 
                @foreach ($terms as $term)
                <tr>
                    <td>{{ $term->id }}</td>
                    <td>{{ $term->start }}</td>
                    <td>{{ $term->end }}</td>
                    <td>{{ $term->name_terms }}</td>
                    <td>{{ $term->description_terms }}</td>
                    <td>{{ $term->active }}</td>

                    <td>
                       <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $term->id }}">Edit</a>
                      <a href="javascript:void(0)" class="btn btn-primary delete" data-id="{{ $term->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
             {!! $terms->links() !!}
        </div>
    </div>        
</div>
<!-- boostrap model -->
    <div class="modal fade" id="ajax-term-model" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ajaxtermModel"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="addEdittermForm" name="addEditBookForm" class="form-horizontal" method="POST">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Start</label>
                <div class="col-sm-12">
                  <input type="datetime-local" class="form-control" id="start" name="start" >
                </div>
              </div>  
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">End</label>
                <div class="col-sm-12">
                  <input type="datetime-local" class="form-control" id="end" name="end">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Active</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="active" name="active" placeholder="Enter Active">
                </div>
              </div>
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">Save changes
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->
<script type="text/javascript">
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
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('terms') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxtermModel').html("Edit Book");
              $('#ajax-term-model').modal('show');
              $('#id').val(res.id);
              $('#start').val(res.start);
              $('#end').val(res.end);
              $('#name').val(res.name);
              $('#description').val(res.description);
              $('#active').val(res.active);
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('terms') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              window.location.reload();
           }
        });
       }
    });
    $('body').on('click', '#btn-save', function (event) {
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
            url: "{{ url('terms') }}",
            data: {
              id:id,
              start:start,
              end:end,
              name:name,
              description:description,
              active:active,
            },
            dataType: 'json',
            success: function(res){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });
    });
});
</script>
</body>
<script src="{{asset('js/termscrud.js')}}"></script>
</html>
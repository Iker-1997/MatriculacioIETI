<!DOCTYPE html>
<html lang="en">
<head>
    <title>Terms</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background:#f2f2f2;
        }
        .section{
            padding:50px;
            background:#fff;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="offset-md-3 col-md-6 section">
                <h2>Terms</h2>
                <div class="alert alert-success alert-block" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong class="success-msg"></strong>
                </div>
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="email">Start:</label>
                        <input type="datetime-local" class="form-control" id="start"  name="start">
                        <span class="text-danger error-text start_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="pwd">End:</label>
                        <input type="datetime-local" class="form-control" id="end"  name="end">
                        <span class="text-danger error-text end_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="address">Name:</label>
                        <input class="form-control" name="name" id="name" placeholder="Nombre ">
                        <span class="text-danger error-text name_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="address">Description:</label>
                        <input class="form-control" name="description" id="description" placeholder="Nombre ">
                        <span class="text-danger error-text description_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="address">Active:</label>
                        <input class="form-control" name="active" id="active" >
                        <span class="text-danger error-text active_err"></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-submit").click(function(e){
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var start = $("#start").val();
                var end = $("#end").val();
                var name = $("#name").val();
                var description = $("#description").val();
                var active = $("#active").val();


                $.ajax({
                    url: "{{ route('terms.store') }}",
                    type:'POST',
                    data: {_token:_token, start:start, end:end, name:name, description:description, active:active},
                    success: function(data) {
                      printMsg(data);
                    }
                });
            }); 

            function printMsg (msg) {
              if($.isEmptyObject(msg.error)){
                  console.log(msg.success);
                  $('.alert-block').css('display','block').append('<strong>'+msg.success+'</strong>');
              }else{
                $.each( msg.error, function( key, value ) {
                  $('.'+key+'_err').text(value);
                });
              }
            }
        });
    </script>
</body>
</html>
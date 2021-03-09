<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Terms</title>
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
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewterm" class="btn btn-success">Add Terms</button></div>
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
</body>
<script src="{{asset('js/termscrud.js')}}"></script>
</html>
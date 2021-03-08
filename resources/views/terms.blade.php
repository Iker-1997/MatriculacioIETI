<!DOCTYPE html>
<html>
  <head>
    <title>Terms</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
  </head>
  <body>
    <div class="container mt-5">
        <h4 class="text-center font-weight-bold">Panel Control Terms</h4>

        <div class="row">
    <div class="col-xl-6">
        <div id="result"></div>
    </div>

    <div class="col-xl-6 text-right">
        <a href="javascript:void(0);" data-target="#addTermsModal" data-toggle="modal" class="btn btn-success"> Add New Terms </a>
    </div>
</div>

<table class="table table-striped mt-4">
    <thead>
        <th> Id </th>
        <th> Start </th>
        <th> End </th>
        <th> Name </th>
        <th> Description </th>
        <th> Active </th>
        <th> Action </th>
    </thead>

    <tbody>
        @foreach ($terms as $term)
            <tr>
                <td> {{$term->id}} </td>
                <td> {{$term->start}} </td>
                <td> {{$term->end}} </td>
                <td> {{$term->name_terms}} </td>
                <td> {{$term->description_terms}} </td>
                <td> {{$term->active}} </td>

                <td>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#addTermsModal" data-id="{{$term->id}}" data-start="{{$term->start}}" data-end="{{$term->end}}" data-name="{{$term->name}}" data-description="{{$term->description}}" data-active="{{$term->active}}"  data-action="edit" class="btn btn-success btn-sm"> Edit </a>

                    <a href="javascript:void(0);" onclick="deleteTerms({{$term->id}})" class="btn btn-danger btn-sm"> Delete </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<!-- Create post modal -->
<div class="modal fade" id="addTermsModal" tabindex="-1" role="dialog" aria-labelledby="addTermsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addTermsModalLabel"> Create Terms </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> × </span>
          </button>
        </div>

        <div class="modal-body">
            <form method="POST" id="termsForm">
                {{-- @csrf --}}
                <input type="hidden" id="id_hidden" name="id" />
                <div class="form-group">
                    <label for="title"> Start <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="start" id="start" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title"> End <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="end" id="end" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title"> Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title"> Description <span class="text-danger">*</span></label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title"> Active <span class="text-danger">*</span></label>
                    <input type="number" name="title" id="title" class="form-control">
                </div>
            </form>
        </div>

        <div class="modal-footer">
          <button type="submit" id="createBtn" class="btn btn-primary"> Save </button>
        </div>

        <div class="result"></div>

      </div>
    </div>
</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="{{asset('js/termscrud.js')}}"></script>
  </body>
</html>
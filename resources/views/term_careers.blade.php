@section('breadcrumbs')
  {{ Breadcrumbs::render('Career', $term[0]) }}
@endsection
<x-app-layout>
  <div class="flex justify-around">
    <button type="button" id="addNewTerm" onClick="addTermForm();" class="m-3 bg-mtr-dark p-1 w-4/12 text-center font-extrabold rounded-sm text-base">ADD Terms</button>
    <a href="" class="m-3 bg-mtr-dark p-1 w-4/12 text-center font-extrabold rounded-sm text-base">IMPORT Terms</a>
  </div>
  <div class="p-5">
    <table class="w-full">
      <caption class="mb-4 text-4xl">{{ $term[0]->name_terms }}</caption>
      <thead>
        <tr>
          <th class="border-2 border-mtr-dark">Name</th>
          <th class="border-2 border-mtr-dark">Description</th>
          <th class="border-2 border-mtr-dark">Family</th>
          <th class="border-2 border-mtr-dark">Hours</th>
        </tr>
      </thead>
      <tbody> 
        @foreach ($careers as $career)
          <tr class="text-center" data-id="{{ $career->id }}">
            <td class="border-2 border-mtr-dark text"><a href="">{{ $career->name_careers }}</a></td>
            <td class="hidden border-2 border-mtr-dark input"><input value="{{ $career->name_careers }}" type="text" name="nameEdit" class="nameEdit"></td>
            <td class="border-2 border-mtr-dark text">{{ $career->code_careers }}</td>
            <td class="hidden border-2 border-mtr-dark input"><input value="{{ $career->code_careers }}" type="text" name="codeEdit" class="codeEdit"></td>
            <td class="border-2 border-mtr-dark text">{{ $career->family }}</td>
            <td class="hidden border-2 border-mtr-dark input"><input value="{{ $career->family }}" type="text" name="familyEdit" class="familyEdit"></td>
            <td class="border-2 border-mtr-dark text">{{ $career->career_hours }}</td>
            <td class="hidden border-2 border-mtr-dark input"><input value="{{ $career->career_hours }}" type="text" name="hoursEdit" class="hoursEdit"></td>
            <td class="p-2 flex flex-col justify-center md:flex-row space-y-2 md:space-y-0 md:space-x-6">
              <button id="edit" onClick="editRow({{ $career->id }})" class="bg-mtr-dark py-2 px-4 text-white rounded text">Edit</button>
              <button id="save" onClick="saveChange({{ $career->id }})" class="hidden bg-mtr-dark py-2 px-4 text-white rounded input">Save</button>
              <button id="cancel" onClick="cancelChange({{ $career->id }})" class="hidden bg-red-500 py-2 px-4 text-white rounded input">Cancel</button>                
              <a href="/admin/careers/delete/{{$career->id}}" class="bg-red-500 py-2 px-4 text-white rounded text">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!--<script src="{{asset('js/termscrud.js')}}"></script>-->
  <script>
    function editRow(id){
      $("tr[data-id='"+id+"'] .input").removeClass("hidden");
      $("tr[data-id='"+id+"'] .text").addClass("hidden");
    }
    function saveChange(id){
      let start = $("tr[data-id='"+id+"'] .startEdit").val();
      let end = $("tr[data-id='"+id+"'] .endEdit").val();
      let name = $("tr[data-id='"+id+"'] .nameEdit").val();
      let desc = $("tr[data-id='"+id+"'] .descEdit").val();

      $.get({
        url:"/api/terms/update/"+id+"/"+start+"/"+end+"/"+name+"/"+desc,
      }).done(function (){
        $('tbody').empty();
        cancelChange(id);
        $.getJSON({
          url:"/api/terms/updateTable",
        }).done(response => {
          for (const term in response){
            $("tbody").append('<tr class="text-center" data-id="'+response[term][`id`]+'""><td class="border-2 border-mtr-dark"><a href="">'+response[term][`name_terms`]+'</a></td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[term][`name_terms`]+'" type="text" name="nameEdit" class="nameEdit"></td><td class="border-2 border-mtr-dark">'+response[term][`description_terms`]+'</td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[term][`description_terms`]+'" type="text" name="descEdit" class="descEdit"></td><td class="border-2 border-mtr-dark">'+response[term][`start`]+'</td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[term][`start`]+'" type="datetime" name="startEdit" class="startEdit"></td><td class="border-2 border-mtr-dark">'+response[term][`end`]+'</td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[term][`end`]+'" type="datetime" name="endEdit" class="endEdit"></td><td class="p-2 flex flex-col justify-center md:flex-row space-y-2 md:space-y-0 md:space-x-6"><button id="edit" onClick="editRow('+response[term][`id`]+')" class="bg-mtr-dark py-2 px-4 text-white rounded">Edit</button><button id="save" onClick="saveChange('+response[term][`id`]+')" class="hidden bg-mtr-dark py-2 px-4 text-white rounded">Save</button><button id="cancel" onClick="cancelChange('+response[term][`id`]+')" class="hidden bg-red-500 py-2 px-4 text-white rounded">Cancel</button><a href="/admin/terms/delete/'+response[term][`id`]+'" class="bg-red-500 py-2 px-4 text-white rounded">Delete</a></td></tr>');
          }
        });
      });
    }
    function cancelChange(id){
      $("tr[data-id='"+id+"'] .text").removeClass("hidden");
      $("tr[data-id='"+id+"'] .input").addClass("hidden");
    }
    function addTerm(){
      //LO DE AJAX
      let start = $("#start").val();
      let end = $("#end").val();
      let name = $("#name").val();
      let desc = $("#description").val();

      $.get({
        url:"/api/terms/create/"+start+"/"+end+"/"+name+"/"+desc,
      }).done(function (){
        $('tbody').empty();
        $("#formAdd").remove();
        $.getJSON({
          url:"/api/terms/updateTable",
        }).done(response => {
          for (const term in response){
            $("tbody").append('<tr class="text-center" data-id="'+response[term][`id`]+'""><td class="border-2 border-mtr-dark"><a href="">'+response[term][`name_terms`]+'</a></td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[term][`name_terms`]+'" type="text" name="nameEdit" class="nameEdit"></td><td class="border-2 border-mtr-dark">'+response[term][`description_terms`]+'</td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[term][`description_terms`]+'" type="text" name="descEdit" class="descEdit"></td><td class="border-2 border-mtr-dark">'+response[term][`start`]+'</td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[term][`start`]+'" type="datetime" name="startEdit" class="startEdit"></td><td class="border-2 border-mtr-dark">'+response[term][`end`]+'</td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[term][`end`]+'" type="datetime" name="endEdit" class="endEdit"></td><td class="p-2 flex flex-col justify-center md:flex-row space-y-2 md:space-y-0 md:space-x-6"><button id="edit" onClick="editRow('+response[term][`id`]+')" class="bg-mtr-dark py-2 px-4 text-white rounded">Edit</button><button id="save" onClick="saveChange('+response[term][`id`]+')" class="hidden bg-mtr-dark py-2 px-4 text-white rounded">Save</button><button id="cancel" onClick="cancelChange('+response[term][`id`]+')" class="hidden bg-red-500 py-2 px-4 text-white rounded">Cancel</button><a href="/admin/terms/delete/'+response[term][`id`]+'" class="bg-red-500 py-2 px-4 text-white rounded">Delete</a></td></tr>');
          }
        });
      });
    }
    function cancelAddTerm(){
      $("#formAdd").remove();
    }
    function addTermForm(){
      if( !$("#formAdd").length ){
        $("#addNewTerm").parent().after(
        "<form id='formAdd' action='' method='POST' class='w-full p-6'><div class='flex justify-center items-center space-x-4'><div class='my-2'><label for='name'>Name: </label><input type='text' name='name' id='name'></div><div class='my-2'><label for='description'>Descripition: </label><input type='text' name='description' id='description'></div><input class='bg-mtr-dark py-2 px-4 text-white rounded h-3/4' type='button' value='Cancel' onclick='cancelAddTerm()'></div></div><br><div class='flex justify-center items-center space-x-4'><div class='my-2'><label for='start'>Starts at: </label><input type='datetime-local' name='start' id='start'></div><div class='my-2'><label for='end'>Ends at: </label><input type='datetime-local' name='end' id='end'></div><input class='bg-mtr-dark py-2 px-4 text-white rounded h-3/4' type='button' value='Add' onclick='addTerm()'></div></form>"
        );
      }
    }
  </script>
</x-app-layout>
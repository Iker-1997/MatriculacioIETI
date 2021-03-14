<x-app-layout>
  <script src="{{asset('js/breadcrumb.js')}}"></script>
  <div class="flex justify-around">
    <button type="button" id="addNewCicle" onClick="addCicleForm();" class="m-3 bg-mtr-dark p-1 w-4/12 text-center font-extrabold rounded-sm text-base">ADD Cicles</button>
    <a href="" class="m-3 bg-mtr-dark p-1 w-4/12 text-center font-extrabold rounded-sm text-base">IMPORT Cicles</a>
  </div>
  <div class="p-5">
    <table class="w-full">
      <caption class="mb-4 text-4xl">CICLES</caption>
      <thead>
        <tr>
          <th class="border-2 border-mtr-dark">Name</th>
          <th class="border-2 border-mtr-dark">Description</th>
          <th class="border-2 border-mtr-dark">Start</th>
          <th class="border-2 border-mtr-dark">End</th>
        </tr>
      </thead>
      <tbody> 
        @foreach ($cicles as $cicle)
          @if($cicle->deleted_at == null)
            <tr class="text-center" data-id="{{ $cicle->id }}">
              <td class="border-2 border-mtr-dark text"><a href="">{{ $cicle->name_terms }}</a></td>
              <td class="hidden border-2 border-mtr-dark input"><input value="{{ $cicle->name_terms }}" type="text" name="nameEdit" class="nameEdit"></td>
              <td class="border-2 border-mtr-dark text">{{ $cicle->description_terms }}</td>
              <td class="hidden border-2 border-mtr-dark input"><input value="{{ $cicle->description_terms }}" type="text" name="descEdit" class="descEdit"></td>
              <td class="border-2 border-mtr-dark text">{{ $cicle->start }}</td>
              <td class="hidden border-2 border-mtr-dark input"><input value="{{ $cicle->start }}" type="datetime" name="startEdit" class="startEdit"></td>
              <td class="border-2 border-mtr-dark text">{{ $cicle->end }}</td>
              <td class="hidden border-2 border-mtr-dark input"><input value="{{ $cicle->end }}" type="datetime" name="endEdit" class="endEdit"></td>
              <td class="p-2 flex flex-col justify-center md:flex-row space-y-2 md:space-y-0 md:space-x-6">
                <button id="edit" onClick="editRow({{ $cicle->id }})" class="bg-mtr-dark py-2 px-4 text-white rounded text">Edit</button>
                <button id="save" onClick="saveChange({{ $cicle->id }})" class="hidden bg-mtr-dark py-2 px-4 text-white rounded input">Save</button>
                <button id="cancel" onClick="cancelChange({{ $cicle->id }})" class="hidden bg-red-500 py-2 px-4 text-white rounded input">Cancel</button>                
                <a href="/admin/cicles/delete/{{$cicle->id}}" class="bg-red-500 py-2 px-4 text-white rounded text">Delete</a>
              </td>
            </tr>
          @endif
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
      $.post({
        url:"/api/cicles/update/"+id+"/"+start+"/"+end+"/"+name+"/"+desc,
      }).done(function (){
        $('tbody').empty();
        cancelChange(id);
        $.getJSON({
          url:"/api/cicles/updateTable",
        }).done(response => {
          for (const cicle in response){
            $("tbody").append('<tr class="text-center" data-id="${response[cicle][`id`]}"><td class="border-2 border-mtr-dark"><a href="">${response[cicle][`name_terms`]}</a></td><td class="hidden border-2 border-mtr-dark input"><input value="${response[cicle][`name_terms`]}" type="text" name="nameEdit" class="nameEdit"></td><td class="border-2 border-mtr-dark">${response[cicle][`description_terms`]}</td><td class="hidden border-2 border-mtr-dark input"><input value="${response[cicle][`description_terms`]}" type="text" name="descEdit" class="descEdit"></td><td class="border-2 border-mtr-dark">${response[cicle][`start`]}</td><td class="hidden border-2 border-mtr-dark input"><input value="${response[cicle][`start`]}" type="datetime" name="startEdit" class="startEdit"></td><td class="border-2 border-mtr-dark">${response[cicle][`end`]}</td><td class="hidden border-2 border-mtr-dark input"><input value="${response[cicle][`end`]}" type="datetime" name="endEdit" class="endEdit"></td><td class="p-2 flex flex-col justify-center md:flex-row space-y-2 md:space-y-0 md:space-x-6"><button id="edit" onClick="editRow(${response[cicle][`id`]})" class="bg-mtr-dark py-2 px-4 text-white rounded">Edit</button><button id="save" onClick="saveChange(${response[cicle][`id`]})" class="hidden bg-mtr-dark py-2 px-4 text-white rounded">Save</button><button id="cancel" onClick="cancelChange(${response[cicle][`id`]})" class="hidden bg-red-500 py-2 px-4 text-white rounded">Cancel</button><a href="/admin/cicles/delete/${response[cicle][`id`]}" class="bg-red-500 py-2 px-4 text-white rounded">Delete</a></td></tr>');
          }
        });
      });
    }
    function cancelChange(id){
      $("tr[data-id='"+id+"'] .text").removeClass("hidden");
      $("tr[data-id='"+id+"'] .input").addClass("hidden");
    }
    function addCicle(){
      //LO DE AJAX
      let start = $("#start").val();
      let end = $("#end").val();
      let name = $("#name").val();
      let desc = $("#description").val();
      $.post({
        url:"/api/cicles/create/"+start+"/"+end+"/"+name+"/"+desc,
      }).done(function (){
        $('tbody').empty();
        $("#formAdd").remove();
        $.getJSON({
          url:"/api/cicles/updateTable",
        }).done(response => {
          for (const cicle in response){
            $("tbody").append('<tr class="text-center" data-id="${response[cicle][`id`]}"><td class="border-2 border-mtr-dark"><a href="">${response[cicle][`name_terms`]}</a></td><td class="hidden border-2 border-mtr-dark input"><input value="${response[cicle][`name_terms`]}" type="text" name="nameEdit" class="nameEdit"></td><td class="border-2 border-mtr-dark">${response[cicle][`description_terms`]}</td><td class="hidden border-2 border-mtr-dark input"><input value="${response[cicle][`description_terms`]}" type="text" name="descEdit" class="descEdit"></td><td class="border-2 border-mtr-dark">${response[cicle][`start`]}</td><td class="hidden border-2 border-mtr-dark input"><input value="${response[cicle][`start`]}" type="datetime" name="startEdit" class="startEdit"></td><td class="border-2 border-mtr-dark">${response[cicle][`end`]}</td><td class="hidden border-2 border-mtr-dark input"><input value="${response[cicle][`end`]}" type="datetime" name="endEdit" class="endEdit"></td><td class="p-2 flex flex-col justify-center md:flex-row space-y-2 md:space-y-0 md:space-x-6"><button id="edit" onClick="editRow(${response[cicle][`id`]})" class="bg-mtr-dark py-2 px-4 text-white rounded">Edit</button><button id="save" onClick="saveChange(${response[cicle][`id`]})" class="hidden bg-mtr-dark py-2 px-4 text-white rounded">Save</button><button id="cancel" onClick="cancelChange(${response[cicle][`id`]})" class="hidden bg-red-500 py-2 px-4 text-white rounded">Cancel</button><a href="/admin/cicles/delete/${response[cicle][`id`]}" class="bg-red-500 py-2 px-4 text-white rounded">Delete</a></td></tr>');
          }
        });
      });
    }
    function cancelAddCicle(){
      $("#formAdd").remove();
    }
    function addCicleForm(){
      if( !$("#formAdd").length ){
        $("#addNewCicle").parent().after(
        "<form id='formAdd' action='' method='POST' class='w-full p-6'><div class='flex justify-center items-center space-x-4'><div class='my-2'><label for='name'>Name: </label><input type='text' name='name' id='name'></div><div class='my-2'><label for='description'>Descripition: </label><input type='text' name='description' id='description'></div><input class='bg-mtr-dark py-2 px-4 text-white rounded h-3/4' type='button' value='Cancel' onclick='cancelAddCicle()'></div></div><br><div class='flex justify-center items-center space-x-4'><div class='my-2'><label for='start'>Starts at: </label><input type='datetime-local' name='start' id='start'></div><div class='my-2'><label for='end'>Ends at: </label><input type='datetime-local' name='end' id='end'></div><input class='bg-mtr-dark py-2 px-4 text-white rounded h-3/4' type='button' value='Add' onclick='addCicle()'></div></form>"
        );
      }
    }
  </script>
</x-app-layout>
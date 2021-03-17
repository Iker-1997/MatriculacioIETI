@section('breadcrumbs')
  {{ Breadcrumbs::render('Career', $term[0]) }}
@endsection
<x-app-layout>
  <div class="flex justify-around">
    <button type="button" id="addNewTerm" onClick="addCareerForm();" class="m-3 bg-mtr-dark p-1 w-4/12 text-center font-extrabold rounded-sm text-base">ADD Career</button>
  </div>
  <div class="p-5 mb-10">
    <table class="w-full">
      <caption class="mb-4 text-4xl">{{ $term[0]->name_terms }}</caption>
      <thead>
        <tr>
          <th class="border-2 border-mtr-dark">Name</th>
          <th class="border-2 border-mtr-dark">Code</th>
          <th class="border-2 border-mtr-dark">Family</th>
          <th class="border-2 border-mtr-dark">Hours</th>
        </tr>
      </thead>
      <tbody> 
        @foreach ($careers as $career)
          <tr class="text-center" data-id="{{ $career->id }}">
            <td class="border-2 border-mtr-dark text text-blue-500"><a href="">{{ $career->name_careers }}</a></td>
            <td class="hidden border-2 border-mtr-dark input"><input value="{{ $career->name_careers }}" type="text" name="nameEdit" class="nameEdit"></td>
            <td class="border-2 border-mtr-dark text">{{ $career->code_careers }}</td>
            <td class="hidden border-2 border-mtr-dark input"><input value="{{ $career->code_careers }}" type="text" name="codeEdit" class="codeEdit"></td>
            <td class="border-2 border-mtr-dark text">{{ $career->family }}</td>
            <td class="hidden border-2 border-mtr-dark input"><input value="{{ $career->family }}" type="text" name="familyEdit" class="familyEdit"></td>
            <td class="border-2 border-mtr-dark text">{{ $career->career_hours }}</td>
            <td class="hidden border-2 border-mtr-dark input"><input value="{{ $career->career_hours }}" type="number" name="hoursEdit" class="hoursEdit"></td>
            <td class="p-2 flex flex-col justify-center md:flex-row space-y-2 md:space-y-0 md:space-x-6">
              <button id="edit" onClick="editRow({{ $career->id }})" class="bg-mtr-dark py-2 px-4 text-white rounded text">Edit</button>
              <button id="save" onClick="saveChange({{ $career->id }})" class="hidden bg-mtr-dark py-2 px-4 text-white rounded input">Save</button>
              <button id="cancel" onClick="cancelChange({{ $career->id }})" class="hidden bg-red-500 py-2 px-4 text-white rounded input">Cancel</button>                
              <a href="/admin/career/delete/{{$career->id}}" class="bg-red-500 py-2 px-4 text-white rounded text">Delete</a>
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
      let site = window.location.pathname;
      let term = site.substring(site.lastIndexOf('/') + 1);
      let family = $("tr[data-id='"+id+"'] .familyEdit").val();
      let hours = $("tr[data-id='"+id+"'] .hoursEdit").val();
      let name = $("tr[data-id='"+id+"'] .nameEdit").val();
      let code = $("tr[data-id='"+id+"'] .codeEdit").val();

      $.get({
        url:"/api/careers/update/"+id+"/"+term+"/"+name+"/"+code+"/"+family+"/"+hours,
      }).done(function (){
        $('tbody').empty();
        cancelChange(id);
        $.getJSON({
          url:"/api/careers/updateTable",
        }).done(response => {
          for (const career in response){
            $("tbody").append('<tr class="text-center" data-id="'+response[career][`id`]+'""><td class="border-2 border-mtr-dark text text-blue-500"><a href="">'+response[career][`name_careers`]+'</a></td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[career][`name_careers`]+'" type="text" name="nameEdit" class="nameEdit"></td><td class="border-2 border-mtr-dark text">'+response[career][`code_careers`]+'</td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[career][`code_career`]+'" type="text" name="codeEdit" class="codeEdit"></td><td class="border-2 border-mtr-dark text">'+response[career][`family`]+'</td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[career][`family`]+'" type="text" name="familyEdit" class="familyEdit"></td><td class="border-2 border-mtr-dark text">'+response[career][`career_hours`]+'</td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[career][`career_hours`]+'" type="number" name="hoursEdit" class="hoursEdit"></td><td class="p-2 flex flex-col justify-center md:flex-row space-y-2 md:space-y-0 md:space-x-6"><button id="edit" onClick="editRow('+response[career][`id`]+')" class="bg-mtr-dark py-2 px-4 text-white rounded text">Edit</button><button id="save" onClick="saveChange('+response[career][`id`]+')" class="hidden bg-mtr-dark py-2 px-4 text-white rounded input">Save</button><button id="cancel" onClick="cancelChange('+response[career][`id`]+')" class="hidden bg-red-500 py-2 px-4 text-white rounded input">Cancel</button><a href="/admin/career/delete/'+response[career][`id`]+'" class="bg-red-500 py-2 px-4 text-white rounded text">Delete</a></td></tr>');
          }
        });
      });
    }
    function cancelChange(id){
      $("tr[data-id='"+id+"'] .text").removeClass("hidden");
      $("tr[data-id='"+id+"'] .input").addClass("hidden");
    }
    function addCareer(){
      //LO DE AJAX
      let site = window.location.pathname;
      let term = site.substring(site.lastIndexOf('/') + 1);
      let family = $("#family").val();
      let hours = $("#hours").val();
      let name = $("#name").val();
      let code = $("#code").val();

      $.get({
        url:"/api/careers/create/"+term+"/"+name+"/"+code+"/"+family+"/"+hours,
      }).done(function (){
        $('tbody').empty();
        $("#formAdd").remove();
        $.getJSON({
          url:"/api/careers/updateTable/"+term,
        }).done(response => {
          for (const career in response){
            $("tbody").append('<tr class="text-center" data-id="'+response[career][`id`]+'""><td class="border-2 border-mtr-dark text text-blue-500"><a href="">'+response[career][`name_careers`]+'</a></td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[career][`name_careers`]+'" type="text" name="nameEdit" class="nameEdit"></td><td class="border-2 border-mtr-dark text">'+response[career][`code_careers`]+'</td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[career][`code_career`]+'" type="text" name="codeEdit" class="codeEdit"></td><td class="border-2 border-mtr-dark text">'+response[career][`family`]+'</td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[career][`family`]+'" type="text" name="familyEdit" class="familyEdit"></td><td class="border-2 border-mtr-dark text">'+response[career][`career_hours`]+'</td><td class="hidden border-2 border-mtr-dark input"><input value="'+response[career][`career_hours`]+'" type="number" name="hoursEdit" class="hoursEdit"></td><td class="p-2 flex flex-col justify-center md:flex-row space-y-2 md:space-y-0 md:space-x-6"><button id="edit" onClick="editRow('+response[career][`id`]+')" class="bg-mtr-dark py-2 px-4 text-white rounded text">Edit</button><button id="save" onClick="saveChange('+response[career][`id`]+')" class="hidden bg-mtr-dark py-2 px-4 text-white rounded input">Save</button><button id="cancel" onClick="cancelChange('+response[career][`id`]+')" class="hidden bg-red-500 py-2 px-4 text-white rounded input">Cancel</button><a href="/admin/career/delete/'+response[career][`id`]+'" class="bg-red-500 py-2 px-4 text-white rounded text">Delete</a></td></tr>');
          }
        });
      });
    }
    function canceladdCareer(){
      $("#formAdd").remove();
    }
    function addCareerForm(){
      if( !$("#formAdd").length ){
        $("#addNewTerm").parent().after(
        "<form id='formAdd' action='' method='POST' class='w-full p-6'><div class='flex justify-center items-center space-x-4'><div class='my-2'><label for='name'>Name: </label><input type='text' name='name' id='name'></div><div class='my-2'><label for='code'>Code: </label><input type='text' name='code' id='code'></div><input class='bg-red-500 py-2 px-4 text-white rounded h-3/4' type='button' value='Cancel' onclick='canceladdCareer()'></div></div><br><div class='flex justify-center items-center space-x-4'><div class='my-2'><label for='family'>Family: </label><input type='text' name='family' id='family'></div><div class='my-2'><label for='hours'>Hours: </label><input type='number' name='hours' id='hours'></div><input class='bg-mtr-dark py-2 px-4 text-white rounded h-3/4' type='button' value='Add' onclick='addCareer()'></div></form>"
        );
      }
    }
  </script>
</x-app-layout>
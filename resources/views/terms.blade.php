<x-app-layout>

  <div class="text-center"><button type="button" id="addNewterm" class="m-3 bg-mtr-dark p-1 w-4/12 text-center font-extrabold rounded-sm text-base">Add Terms</button></div>
  <div class="p-3">
      <table class="w-full border-2 border-mtr-dark table-auto">
        <caption class="mb-4 text-4xl">TERMS</caption>
        <thead>
          <tr>
            <th class="border-2 border-mtr-dark">ID</th>
            <th class="border-2 border-mtr-dark">Start</th>
            <th class="border-2 border-mtr-dark">End</th>
            <th class="border-2 border-mtr-dark">Name</th>
            <th class="border-2 border-mtr-dark">Description</th>
            <th class="border-2 border-mtr-dark">Active</th>
            <th class="border-2 border-mtr-dark">Action</th>
          </tr>
        </thead>
        <tbody> 
          @foreach ($terms as $term)
          <tr class="text-center">
              <td class="border-2 border-mtr-dark">{{ $term->id }}</td>
              <td class="border-2 border-mtr-dark">{{ $term->start }}</td>
              <td class="border-2 border-mtr-dark">{{ $term->end }}</td>
              <td class="border-2 border-mtr-dark">{{ $term->name_terms }}</td>
              <td class="border-2 border-mtr-dark">{{ $term->description_terms }}</td>
              <td class="border-2 border-mtr-dark">{{ $term->active }}</td>

              <td class="p-2 flex justify-around">
                <a href="javascript:void(0)" class="bg-mtr-dark p-2 text-white rounded" data-id="{{ $term->id }}">Edit</a>
                <a href="javascript:void(0)" class="bg-mtr-dark p-2 text-white rounded" data-id="{{ $term->id }}">Delete</a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {!! $terms->links() !!}
  </div>

  <script src="{{asset('js/termscrud.js')}}"></script>


</x-app-layout>

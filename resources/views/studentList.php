<x-app-layout>
  <div class="text-center"><button type="button" id="addNewterm" class="m-3 bg-mtr-dark p-1 w-4/12 text-center font-extrabold rounded-sm text-base">Add Terms</button></div>
  <div class="p-3">
    @section('breadcrumbs')
      {{ Breadcrumbs::render('student') }}
    @endsection
      <table class="w-full border-2 border-mtr-dark table-auto">
        <caption class="mb-4 text-4xl">STUDENTS</caption>
        <thead>
          <tr>
            <th class="border-2 border-mtr-dark">ID</th>
            <th class="border-2 border-mtr-dark">USER</th>
            <th class="border-2 border-mtr-dark">TERM</th>
            <th class="border-2 border-mtr-dark">CAREER</th>
            <th class="border-2 border-mtr-dark">DNI</th>
            <th class="border-2 border-mtr-dark">STATE</th>
            <th class="border-2 border-mtr-dark">ACTION</th>
          </tr>
        </thead>
        <tbody> 
          @foreach ($studentList as $student)
          <tr class="text-center">
              <td class="border-2 border-mtr-dark">{{ $student->id }}</td>
              <td class="border-2 border-mtr-dark">{{ $student->user_id }}</td>
              <td class="border-2 border-mtr-dark">{{ $student->term_id }}</td>
              <td class="border-2 border-mtr-dark">{{ $student->career_id }}</td>
              <td class="border-2 border-mtr-dark">{{ $student->dni }}</td>
              <td class="border-2 border-mtr-dark">{{ $student->state }}</td>

              <td class="p-2 flex justify-around">
                <a href="javascript:void(0)" class="bg-mtr-dark p-2 text-white rounded" data-id="{{ $student->id }}">Edit</a>
                <a href="javascript:void(0)" class="bg-mtr-dark p-2 text-white rounded" data-id="{{ $student->id }}">Delete</a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
  <script src="{{asset('js/studentcrud.js')}}"></script>
</x-app-layout>
@section('breadcrumbs')
  {{ Breadcrumbs::render('ad_student_list') }}
@endsection
<x-app-layout>
  <div class="text-center">
    <button type="button" id="importStudent" class="m-3 bg-mtr-dark p-1 w-4/12 text-center font-extrabold rounded-sm text-base">Import Student</button>
  </div>
  <div class="p-3">
      <table class="w-full border-2 border-mtr-dark table-auto">
        <caption class="mb-4 text-4xl">STUDENTS</caption>
        <thead>
          <tr>
            <th class="border-2 border-mtr-dark">ID</th>
            <th class="border-2 border-mtr-dark">NAME</th>
            <th class="border-2 border-mtr-dark">EMAIl</th>
            <th class="border-2 border-mtr-dark">Role</th>
          </tr>
        </thead>
        <tbody> 
          @foreach ($ad_student_list as $student)
          <tr class="text-center">
              <td class="border-2 border-mtr-dark">{{ $student->id }}</td>
              <td class="border-2 border-mtr-dark">{{ $student->name }}</td>
              <td class="border-2 border-mtr-dark">{{ $student->email }}</td>
              <td class="border-2 border-mtr-dark">{{ $student->role }}</td>
          </tr>
          @endforeach
        </tbody>
        {{ $ad_student_list->links() }}
      </table>
  </div>
  <script src="{{asset('js/studentcrud.js')}}"></script>
</x-app-layout>
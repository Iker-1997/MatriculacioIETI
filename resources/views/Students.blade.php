@section('breadcrumbs')
  {{ Breadcrumbs::render('Students') }}
@endsection
<x-app-layout>
  <div class="text-center">
    <button type="button" id="importStudent" class="m-3 bg-mtr-dark p-1 w-4/12 text-center font-extrabold rounded-sm text-base">Import Student</button>
  </div>
  <div class="p-3 mb-10">
      <table class="w-full border-2 border-mtr-dark table-auto">
        <caption class="mb-4 text-4xl">STUDENTS</caption>
        <thead>
          <tr>
            <th class="border-2 border-mtr-dark">NAME</th>
            <th class="border-2 border-mtr-dark">EMAIl</th>
          </tr>
        </thead>
        <tbody> 
          @foreach ($students as $student)
          <tr class="text-center">
              <td class="border-2 border-mtr-dark">{{ $student->name }}</td>
              <td class="border-2 border-mtr-dark">{{ $student->email }}</td>
          </tr>
          @endforeach
        </tbody>
        {{ $students->links() }}
      </table>
  </div>
  <!--<script src="{{asset('js/studentcrud.js')}}"></script>-->
</x-app-layout>
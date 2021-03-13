@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard') }}
@endsection
<x-app-layout>
    <div class="py-12">
        <div class="container flex justify-around">
            <a href="/admin/dashboard/terms" class="mx-3 bg-mtr-dark p-5 w-4/12 text-center font-extrabold rounded-sm text-base">VIEW TERMS</a>
            <a href="/admin/dashboard/studentList" class="mx-3 bg-mtr-dark p-5 w-4/12 text-center font-extrabold rounded-sm text-base">VIEW ALUMNS</a>
        </div>
    </div>
    <script src="{{asset('js/breadcrumb.js')}}"></script>
</x-app-layout>
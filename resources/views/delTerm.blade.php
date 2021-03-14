<x-app-layout>

<div class="py-12">
    <div class="container flex justify-around">
        <a href="/admin/terms" class="mx-3 bg-mtr-dark p-5 w-4/12 text-center font-extrabold rounded-sm text-base">VIEW TERMS</a>
        <a href="" class="mx-3 bg-mtr-dark p-5 w-4/12 text-center font-extrabold rounded-sm text-base">VIEW ALUMNS</a>
    </div>
</div>
<!--TERM NAME-->
{{$term[0]->name_terms}}

</x-app-layout>
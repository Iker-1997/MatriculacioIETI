<x-app-layout>

    <div class="py-12">
        <div class="container flex justify-around">
            <a href="/admin/dashboard/terms" class="mx-3 bg-mtr-dark p-5 w-4/12 text-center font-extrabold rounded-sm text-base">VIEW TERMS</a>
            <a href="" class="mx-3 bg-mtr-dark p-5 w-4/12 text-center font-extrabold rounded-sm text-base">VIEW ALUMNS</a>
        </div>
    </div>
    <script>
    var confirm_delete = false;
    if (confirm('Are you sure you want to delete the {{$term[0]->name_terms}} term?')) {
        if (confirm('ARE YOU REALLY SURE YOU WANT TO DELETE THE {{$term[0]->name_terms}} TERM? THIS ACTION CAN NOT BE UNDONE')) {
            var input = prompt("Type {{$term[0]->name_terms}} to delete the term");
            switch(input) {
                case '{{$term[0]->name_terms}}':
                    confirm_delete = true;
                    alert("The term will be deleted.");
                    break;
                default:
                alert("The term has NOT been deleted.");
            }
        } else {
            alert("The term has NOT been deleted.");
        }
    } else {
        alert("The term has NOT been deleted.");
    }
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    if (confirm_delete == true) {
        $.get({
            url:"/api/terms/delete/"+id,
        }).done(function (){
            alert("The term has been deleted. You'll be redirected to the terms site.");
            $(location).attr('href', '/admin/dashboard/terms')
        });
    }
    </script>
    <!--TERM NAME-->
    {{$term}}

</x-app-layout>
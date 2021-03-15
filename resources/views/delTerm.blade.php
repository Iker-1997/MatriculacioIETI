<x-app-layout>
    <script>
        $(document).ready(function(){
            $("#confirmDelete").click(function(){
                var valueToDelete = "{{$term[0]->name_terms}}";
                var valueConfirm = $("#confirm").val();
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                if (valueConfirm == valueToDelete){
                    console.log("Hola");
                    if (confirm('Are you sure you want to delete the {{$term[0]->name_terms}} term?')) {
                        if (confirm('ARE YOU REALLY SURE YOU WANT TO DELETE THE {{$term[0]->name_terms}} TERM? THIS ACTION CAN NOT BE UNDONE')) {
                            $.get({
                                url:"/api/terms/delete/"+id,
                            }).done(function (){
                                alert("The term has been deleted. You'll be redirected to the terms site.");
                                $(location).attr('href', '/admin/dashboard/terms');                        
                            });
                        } else {
                            alert("The term has NOT been deleted.");
                        }
                    } else {
                    alert("The term has NOT been deleted.");
                    }
                } else {
                    alert("The term has NOT been deleted.");
                }
            });
        });
    </script>
    <div class="p-6 pt-16 text-center">
        <p class="font-extrabold">Type "{{$term[0]->name_terms}}" to delete the term</p>
        <br>
        <input type="text" name="confirm" id="confirm">
        <button class="bg-red-500 py-2 px-4 text-white rounded" id="confirmDelete">Confirm</button>
    </div>

</x-app-layout>
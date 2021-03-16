<x-app-layout>
    <script>
        $(document).ready(function(){
            $("#confirmDelete").click(function(){
                var valueToDelete = "{{$career[0]->name_careers}}";
                var valueConfirm = $("#confirm").val();
                var url = window.location.pathname;
                var id = url.substring(url.lastIndexOf('/') + 1);
                if (valueConfirm == valueToDelete){
                    console.log("Hola");
                    if (confirm('Are you sure you want to delete the {{$career[0]->name_careers}} career?')) {
                        if (confirm('ARE YOU REALLY SURE YOU WANT TO DELETE THE {{$career[0]->name_careers}} CAREER? THIS ACTION CAN NOT BE UNDONE')) {
                            $.getJSON({
                                url:"/api/careers/delete/"+id,
                            }).done(function (response){
                                alert("The term has been deleted. You'll be redirected to the terms site.");
                                $(location).attr('href', '/admin/dashboard/term_careers/'+response[id]);                        
                            });
                        } else {
                            alert("The career has NOT been deleted.");
                        }
                    } else {
                    alert("The career has NOT been deleted.");
                    }
                } else {
                    alert("The career has NOT been deleted.");
                }
            });
        });
    </script>
    <div class="p-6 pt-16 text-center">
        <p class="font-extrabold">Type "{{$career[0]->name_careers}}" to delete the career.</p>
        <br>
        <input type="text" name="confirm" id="confirm">
        <button class="bg-red-500 py-2 px-4 text-white rounded" id="confirmDelete">Confirm</button>
    </div>

</x-app-layout>
@extends('layouts.app')


@section('content')

    <div class="container" style="font-size: 18px;">
        <table class="table table-hover table-responsive ml-4">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOM</th>
                <th scope="col">EMAIL</th>
                <th scope="col">STATUT</th>
                <th scope="col" class="text-center">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    @if($user->isAdmin() == true)
                        <td><span class="badge badge-pill badge-success text-white">admin</span> @else </td>
                    @endif
                    @if( $user->isAdmin() == false)
                        <td><span class="badge badge-pill badge-primary text-white">utilisateur</span></td>
                    @endif

                    <td class="d-flex">
                        <a href="#">
                            <button class="btn btn-success ml-4 mr-2">VOIR</button>
                        </a>

                        <a href="/admin/editEmailName/{{$user->id}}">
                            <button class="btn btn-warning ml-4">EDITER</button>
                        </a>

                        <a href="#">
                            <button class="btn btn-danger ml-4 mr-2 deletebtn">SUPPRIMER</button>
                        </a>

                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
        <div class="row justify-content-center">
            {{$users->links()}}
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-body" style="font-size: 18px">

                    <form id="deleteform">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id" id="delete_id">

                        <p class="text-center">Confirmer la Suppression ? </p>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">OUI</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">NON</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>





<script type="text/javascript">

    $(document).ready(function () {

        // Début du Ajax permettant de Supprimer un Utilisateur
        $('.deletebtn').on('click', function () {
            $('#deleteModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#delete_id').val(data[0]);
        });
        $('#deleteform').on('submit', function (e) {
            e.preventDefault();
            let id = $('#delete_id').val();
            $.ajax({
                type: "DELETE",
                url: "/admin/deleteEmailName/" + id,
                data: $('#deleteform').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#deleteModal').modal('hide');
                    //alert('Le Post a été Supprimé avec Succès !');
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        // Fin du code Ajax permettant de Supprimer un Utilisateur


    });

</script>

@endsection

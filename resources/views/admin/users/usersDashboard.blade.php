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

                        <form action="{{ route('admin.deleteEmailName', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger ml-4">SUPPRIMER</button>
                        </form>

                    </td>
                </tr>



            @endforeach

            </tbody>
        </table>
        <div class="row justify-content-center">
            {{$users->links()}}
        </div>
    </div>



@endsection

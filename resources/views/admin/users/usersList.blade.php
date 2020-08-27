@extends('layouts.app')


@section('content')
    <div class="col-md-12">
        <div class="">
            <div class="container" style="font-size: 18px;">
                <table class="table table-hover  table-responsive ml-3">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOM</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col" class="text-center">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                @if($user->isAdmin())
                                    <span class="badge badge-pill badge-success text-white">admin</span>
                                @endif


                                @if(! $user->mailIsConfirmed())
                                    <span class="badge badge-info text-white">mail non confirmée</span>
                                @else
                                    @if($user->isBanned())
                                        <span class="badge badge-danger text-white">Banni</span>
                                    @else
                                        @if($user->isApproved() && ! $user->isAdmin())
                                            <span class="badge badge-success text-white">Validé</span>
                                        @endif
                                        @if($user->isSuspended())
                                            <span class="badge badge-danger text-white">Suspendu</span>
                                        @endif
                                        @if(! $user->isSuspended() && ! $user->isApproved())
                                            <span class="badge badge-danger text-white">Validation En Attente</span>
                                        @endif
                                    @endif
                                @endif
                                {{$user->name}}
                            </td>

                            <td>{{$user->email}}</td>
                            <td class="d-flex">
                                @if($user->mailIsConfirmed())

                                    @if($user->isBanned())
                                        <a href="/admin/approve/{{$user->id}}">
                                            <button class="btn btn-success mr-2">Valider</button>
                                        </a>
                                    @endif

                                    @if(! $user->isBanned())
                                        @if($user->isApproved() && ! $user->isAdmin())
                                            <a href="/admin/suspend/{{$user->id}}">
                                                <button class="btn btn-warning ml-2 mr-2">Suspendre</button>
                                            </a>
                                        @endif
                                        @if($user->isSuspended())
                                            <a href="/admin/approve/{{$user->id}}">
                                                <button class="btn btn-success mr-2">Valider</button>
                                            </a>
                                        @endif
                                        @if(! $user->isSuspended() && ! $user->isApproved())
                                            <a href="/admin/approve/{{$user->id}}">
                                                <button class="btn btn-success mr-2">Valider</button>
                                            </a>
                                            <a href="/admin/suspend/{{$user->id}}">
                                                <button class="btn btn-warning ml-2 mr-2">Suspendre</button>
                                            </a>
                                        @endif
                                        @if(! $user->isAdmin())
                                            <a href="/admin/ban/{{$user->id}}">
                                                <button class="btn btn-danger ml-2">Bannir</button>
                                            </a>
                                        @endif
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-center">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection

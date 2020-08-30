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
                        <th scope="col">STATUT</th>
                        <th scope="col" class="text-center">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>


                                @if(! $user->mailIsConfirmed())
                                    <span class="badge badge-info text-white">mail non confirmé</span>
                                @else
                                    @if($user->isBanned())
                                        <span class="badge badge-danger text-white">Banni(e)</span>
                                    @else
                                        @if($user->isApproved() && ! $user->isAdmin())
                                            <span class="badge badge-success text-white">Approuvé(e)</span>
                                        @endif
                                        @if(! $user->isBanned() && ! $user->isApproved())
                                            <span class="badge badge-danger text-white">Validation En Attente</span>
                                        @endif
                                    @endif
                                @endif
                                {{$user->name}}
                            </td>

                            <td>{{$user->email}}</td>

                            <td>
                                <span class="badge badge-pill badge-success text-white">
                                    {{implode(',', $user->roles()->get()->pluck('name')->toArray())}}
                                </span>
                            </td>



                            <td class="d-flex">
                                <a href="/admin/editRole/{{$user->id}}">
                                    <button class="btn btn-warning mr-2">EDITER</button>
                                </a>

                                @if($user->mailIsConfirmed())

                                    @if($user->isBanned())
                                        <a href="/admin/approve/{{$user->id}}">
                                            <button class="btn btn-success mr-2">Approuver</button>
                                        </a>
                                    @endif

                                    @if(! $user->isBanned())
                                        @if($user->isApproved() && ! $user->isAdmin())
                                            <a href="/admin/ban/{{$user->id}}">
                                                <button class="btn btn-secondary ml-2 mr-2">Bannir</button>
                                            </a>
                                        @endif
                                        @if(! $user->isBanned() && ! $user->isApproved())
                                            <a href="/admin/approve/{{$user->id}}">
                                                <button class="btn btn-success mr-2">Approuver</button>
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

@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-striped">
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
                            <th scope="row">{{$user->id}}</th>
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
                                            <span class="badge badge-success text-white">Approuvé(e)</span>
                                        @endif
                                        @if($user->isRefused())
                                            <span class="badge badge-danger text-white">Suspendu(e)</span>
                                        @endif
                                        @if(! $user->isRefused() && ! $user->isApproved())
                                            <span class="badge badge-danger text-white">En Attente</span>
                                        @endif
                                    @endif
                                @endif
                                {{$user->name}}
                            </td>

                            <td>{{$user->email}}</td>
                            <td style="text-align: end">
                                @if($user->mailIsConfirmed())
                                    @if(! $user->isBanned())
                                        <a href="/admin/refuse/{{$user->id}}" class="btn btn-warning">Suspendre</a>
                                        <a href="/admin/approve/{{$user->id}}" class="btn btn-success">Apprové(e)</a>
                                        <a href="/admin/ban/{{$user->id}}" class="btn btn-outline-danger">Bannir</a>
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

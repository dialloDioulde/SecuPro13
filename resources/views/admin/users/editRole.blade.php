@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-info text-white">{{ __('MODIFICATION DES RÔLES') }}</div>

                    <div class="card-body">
                        <form action="/admin/updateRole/{{$user->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            @foreach($roles as $role)
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}" id="{{$role->id}}"
                                            @foreach($user->roles as $userRole)
                                                @if($userRole->id == $role->id) checked @endif
                                            @endforeach>
                                    <label for="{{$role->id}}" class="form-check-label">{{$role->name}}</label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary">ENREGISTRER</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


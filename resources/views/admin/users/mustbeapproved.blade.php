@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-3 bg-info text-dark">
                <p class="mt-2 text-center"></p>
            </div>
        </div>
    </div>


    <div class="col-md-6 mt-5 bg-white ml-5">
        <div class="card-header">
            <h4 class="container card-body">Vous devez être Approuvé par l'Administrarteur !</h4>
            <div class="card-body">
                <p class="card-text">
                    Merci de bien vouloir patienter l'Administrateur du Site approuvera votre Compte dans les plus brefs delais. <br>
                    Vous recevrez une notification de la part de l'Administrateur !
                </p>
            </div>
        </div>
    </div>

@endsection

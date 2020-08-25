<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index()
   {
       // Retourne tous les Utilisateurs inscrits en Bases De Données y compris ceux dont le compte est suspendu (withTrashed)
        $users = User::withTrashed()->paginate(10);
        return view('admin.users.listUsers', compact('users'));
   }
    //
}

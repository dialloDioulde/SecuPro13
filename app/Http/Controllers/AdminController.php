<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index()
   {
       // Retourne tous les Utilisateurs inscrits en Bases De Données
        $users = User::paginate(10);
        return view('admin.users.listUsers', compact('users'));
   }
    //
}

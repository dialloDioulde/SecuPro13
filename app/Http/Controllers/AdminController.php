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


    // La fonction approve permet de Valider le compte de l'Utilisateur
    public function approve($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $user->approved_at = now(); // On prend la date au moment du clic sur le bouton VALIDER

        // Si le compte de l'Utilisateur était déjà Suspendu on lève la Suspension en mettant la date à Null
        if($user->deleted_at != null){
            $user->deleted_at = null;
        }

        $user->save(); // On enregistre la Validation du compte de l'Utilisateur

        return back(); // On retourne sur la même page
    }

    // La fonction refuse permet de Suspendre le compte de l'Utilisateur sans le supprimer de la Bases De Données
    public function refuse($id)
    {
        $user = User::findOrFail($id);

        if($user->approved_at != null){
            $user->approved_at = null;
            $user->save();
        }

        User::destroy($id);

        return back();
    }


    // La fonction ban permet de Bannir l'Utilisateur de la plateforme
    public function ban($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        if(! $user->isAdmin()){
            if ($user->approved_at != null){
                $user->approved_at = null;
            }
            $user->banned_at = now();
            $user->save();
            $user->delete();
        }

        return back();

    }


}

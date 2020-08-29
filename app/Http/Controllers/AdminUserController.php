<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        // Retourne tous les Utilisateurs inscrits en Bases De Données y compris ceux dont le compte est suspendu (withTrashed)
         $users = User::paginate(10);
        //$users = User::withTrashed()->paginate(10);
        return view('admin.users.usersDashboard', compact('users'));
    }


    //
    public function editEmailName($id)
    {
        $userData = User::find($id);
        return view('admin.users.editEmailName', compact('userData'));
    }

    //
    public function updateEmailName(Request $request, $id)
    {
        $user = User::find($id);

        if($user){
            $validate = null;

            if($user->email === $request['email']){
                $validate = $request->validate([
                    'name' => 'required|min:3',
                    'email' => 'required|email',
                ]);
            }else{
                $validate = $request->validate([
                    'name' => 'required|min:3',
                    'email' => 'required|email|unique:users',
                ]);
            }

            if ($validate){
                $user->name = $request['name'];
                $user->email = $request['email'];

                $user->save();

                return "ok";

                //return view('profiles.show')->withUser($user);

            }else{
                return redirect()->back();
            }
        }


    }


    public function deleteEmailName($id)
    {
        $userData = User::find($id);

        if ($userData){

            $userData->approved_at = null;
            $userData->banned_at = null;
            $userData->save();

            $userData->delete();
            return $userData;
        }

    }



    // La fonction indexEmployees renvoie la views contenant le CRUD des Employés
    public function indexEmployees()
    {
        return view('admin.employees.employeesList');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

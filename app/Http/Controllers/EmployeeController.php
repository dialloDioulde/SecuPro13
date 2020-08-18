<?php

namespace App\Http\Controllers;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // Cette fonction Renvoie la liste des Employés
    public function index()
    {
        //
        return $this->listRefresh();
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
     * @return \Illuminate\Http\JsonResponse
     */
    // Cette fonction Enrégistre dans la Base De Données les informations de l'Employé
    public function store(Request $request)
    {
        //
        // Validation des données envoyées par le Formulaire
        $this->validate($request, [
            'e_card_id' => 'required|unique:employees',
            'e_last_name' => 'required',
            'e_first_name' => 'required',
            'e_birthday_date' => 'required',
            'e_city_of_birth' => 'required',
            'e_number' => 'required',
            'e_email' => 'required|email|unique:employees',
            'e_city' => 'required',
            'e_adress' => 'required',
            'e_postal_code' => 'required',
            'e_status' => 'required',
        ]);


        $employees = Employee::create($request->all()); // On Crée l'Employé en Bases De Données

        // Après la Création de l'employé en bases de données on actualise la liste des employés
        if ($employees){
            return $this->listRefresh();
        }

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
     * @return \Illuminate\Http\JsonResponse
     */
    // Cette fonction Renvoie les données de l'Employé correspondant à l'ID renseigné en paramétre
    public function edit($id)
    {
        //
        $employees = Employee::find($id);

        return response()->json($employees);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */

    // Cette fonction permet d'Enregistrer les modifications apportées sur les données d'un Employé
    public function update(Request $request, $id)
    {
        // On récupère l'employé correspondant à l'ID renseigné
        $employees = Employee::find($id);

        if ($employees){
            $validate = null;

            // Si l'email de l'Employé ne change pas
            if ($employees->e_email === $request['e_email']){
                $validate = $this->validate($request, [
                    'e_card_id' => 'required',
                    'e_last_name' => 'required',
                    'e_first_name' => 'required',
                    'e_birthday_date' => 'required',
                    'e_city_of_birth' => 'required',
                    'e_number' => 'required',
                    'e_email' => 'required|email',
                    'e_city' => 'required',
                    'e_adress' => 'required',
                    'e_postal_code' => 'required',
                    'e_status' => 'required',
                ]);
            }
            else{
                // Si l'email de l'Employé récupéré est différent de celui qui avait été renseigné à l'Inscription
                $validate = $this->validate($request, [
                    'e_card_id' => 'required|unique:employees',
                    'e_last_name' => 'required',
                    'e_first_name' => 'required',
                    'e_birthday_date' => 'required',
                    'e_city_of_birth' => 'required',
                    'e_number' => 'required',
                    'e_email' => 'required|email|unique:employees',
                    'e_city' => 'required',
                    'e_adress' => 'required',
                    'e_postal_code' => 'required',
                    'e_status' => 'required',
                ]);
            }

            // Après la Validation Des Données on les persistes en Bases De Données
            if ($validate){
                $employees->e_card_id = request('e_card_id');
                $employees->e_last_name = request('e_last_name');
                $employees->e_first_name = request('e_first_name');
                $employees->e_birthday_date = request('e_birthday_date');
                $employees->e_city_of_birth = request('e_city_of_birth');
                $employees->e_number = request('e_number');
                $employees->e_email = request('e_email');
                $employees->e_city = request('e_city');
                $employees->e_adress = request('e_adress');
                $employees->e_postal_code = request('e_postal_code');
                $employees->e_status = request('e_status');

                $employees->save();

                if($employees){
                    return $this->listRefresh();
                }
            }

        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */

    // Cette fonction permet de Supprimer un Employé de la Base De Données
    public function destroy($id)
    {
        // On récupère l'employé correspondant à l'ID renseigné
        $employees = Employee::find($id);

        if ($employees->delete()){
            return $this->listRefresh(); // On actualise la liste des Employés envoyée
        }
        else{
            return response()->json(['error' => 'La Suppression n\'a pas été prise en compte ! '], 425);
        }

    }

    // Cette fonction nous permet d'Actualiser la liste des Employés envoyés
    private function listRefresh()
    {
        $employees = Employee::paginate(8);

            return response()->json($employees);

    }

    // Cette fonction permet d'effectuer des Recherches sur les Employés par ID
    public function employeesSearch(){
        //
        if(request('words') !== ''){
            $employees['data'] = Employee::where('e_card_id', 'like', '%' . request('words') . '%')->get();
            return response()->json($employees);
        }
    }

}

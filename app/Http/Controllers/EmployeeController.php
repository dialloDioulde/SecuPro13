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
    public function index()
    {
        //
        $employees = Employee::paginate(10);
        return response()->json($employees);
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
    public function store(Request $request)
    {
        //
        $employees = Employee::create($request->all());

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
    public function update($id)
    {
        //
        $employees = Employee::find($id);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        $employees = Employee::find($id);

        if ($employees->delete()){
            return $this->listRefresh();
        }
        else{
            return response()->json(['error' => 'La Suppression n\'a pas été prise en compte ! '], 425);
        }

    }

    private function listRefresh()
    {
        $employees = Employee::paginate(10);

            return response()->json($employees);

    }
}

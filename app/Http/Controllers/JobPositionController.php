<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//model JobPosition
use App\Models\JobPosition;

class JobPositionController extends Controller
{
    //constructor
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //store
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            //company
            'company_id' => 'required',
            'division_id' => 'required',
        ]);

        $jobPosition = new JobPosition;
        $jobPosition->name = $request->name;
        $jobPosition->id_company = $request->company_id;
        $jobPosition->id_division = $request->division_id;
        $jobPosition->save();

        return response()->json([
            'message' => 'Success',
            'data' => $jobPosition
        ]);
    }

    //index
    public function index()
    {
        //job position, join company and division
        $jobPosition = JobPosition::join('company_infos', 'job_positions.id_company', '=', 'company_infos.id')
            ->join('divisions', 'job_positions.id_division', '=', 'divisions.id')
            ->select('job_positions.*', 'company_infos.name as company_name', 'divisions.name as division_name')
            ->get();
        return response()->json([
            'message' => 'Success',
            'data' => $jobPosition
        ]);
    }

    //update, name saja
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id' => 'required'
        ]);

        $jobPosition = JobPosition::find($request->id);
        $jobPosition->name = $request->name;
        $jobPosition->save();

        return response()->json([
            'message' => 'Success',
            'data' => $jobPosition
        ]);
    }

    //destroy
    public function destroy($id)
    {
        $jobPosition = JobPosition::find($id);
        $jobPosition->delete();

        return response()->json([
            'message' => 'Success',
            'data' => $jobPosition
        ]);
    }
}

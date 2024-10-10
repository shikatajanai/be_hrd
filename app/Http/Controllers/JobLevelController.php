<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//model jobLevel
use App\Models\jobLevel;

class JobLevelController extends Controller
{
    //constructor, api
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //index, get data dgn where id_user yg login, join dengan company id_company
    public function index(Request $request)
    {   

        $jobLevel = jobLevel::where('job_levels.id_user', auth()->user()->id)
        ->join('company_infos', 'job_levels.id_company', '=', 'company_infos.id')
        ->select('job_levels.*', 'company_infos.name as company_name')->get();

        return response()->json([
            'message' => 'Success',
            'data' => $jobLevel
        ]);
    }
    //store
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'id_company' => 'required',
            'job_name' => 'required',
        ]);

        //create, id_user adalah user yang sedang login
        $jobLevel = jobLevel::create([
            'id_user' => auth()->user()->id,
            'id_company' => $request->id_company,
            'job_code' => $request->job_code,
            'job_name' => $request->job_name,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $jobLevel
        ]);

    }

    //destroy
    public function destroy($id)
    {
        //find
        $jobLevel = jobLevel::find($id);
        //delete
        $jobLevel->delete();

        return response()->json([
            'message' => 'Success'
        ]);
    }

    //update
    public function update(Request $request)
    {
        //validate
        $request->validate([
            'id' => 'required',
            'job_name' => 'required',
            'description' => 'required'

        ]);

        //find
        $jobLevel = jobLevel::find($request->id);
        //update
        $jobLevel->update([
            'job_name' => $request->job_name,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Success',
        ]);
    }
}

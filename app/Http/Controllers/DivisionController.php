<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//model division
use App\Models\division;


class DivisionController extends Controller
{
    //constructor, api
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    //store
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'id_company' => 'required',
            'name' => 'required',
        ]);

        //create, id_user adalah user yang sedang login
        $division = division::create([
            'id_user' => auth()->user()->id,
            'id_company' => $request->id_company,
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Success',
            'data' => $division
        ]);

    }

    //index
    public function index(Request $request)
    {   

        //get data, wwhere, id_user auth yg login, join dengan company id_company
        $division = division::where('divisions.id_user', auth()->user()->id)
        ->join('company_infos', 'divisions.id_company', '=', 'company_infos.id')
        //joind lagi di pilih sebagai parent, jd gini divisions.parent_id = divisions.id
        ->leftJoin('divisions as parent', 'divisions.parent_id', '=', 'parent.id')
        ->select('divisions.*', 'company_infos.name as company_name', 'parent.name as parent_name')->get();

        return response()->json([
            'message' => 'Success',
            'data' => $division
        ]);
    }

    //getByCompany
    public function getByCompany($id)
    {
        //get data, where id_company = $id
        $division = division::where('id_company', $id)->get();

        return response()->json([
            'message' => 'Success',
            'data' => $division
        ]);
    }

    //destroy
    public function destroy($id)
    {
        //apakah ada $id ini di parent, jika ada maka akan mengirim pesan error, tidak bisa dihapus karena masih ada parent
        $division = division::where('parent_id', $id)->first();
        if ($division) {
            return response()->json([
                'message' => 'Data cannot be deleted because it is still a parent'
            ], 400);
        }

        //get data, where id = $id
        $division = division::where('id', $id)->first();

        //jika data tidak ada
        if (!$division) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        //delete
        $division->delete();

        return response()->json([
            'message' => 'Success'
        ]);
    }
}

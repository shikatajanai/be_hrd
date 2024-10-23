<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//model Shift
use App\Models\shift;


class ShiftController extends Controller
{
    //index
    public function index()
    {
        //shift, join company
        $shift = shift::join('company_infos', 'shifts.id_company', '=', 'company_infos.id')
            ->select('shifts.*', 'company_infos.name as company_name')
            ->get();
        return response()->json([
            'message' => 'Success',
            'data' => $shift
        ]);
    }

    //store 
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            //company
            'id_company' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $shift = new shift;
        $shift->name = $request->name;
        $shift->id_company = $request->id_company;
        $shift->start_time = $request->start_time;
        $shift->end_time = $request->end_time;
        $shift->save();

        return response()->json([
            'message' => 'Success',
            'data' => $shift
        ]);
    }

    //update, name saja
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $shift = shift::find($request->id);
        $shift->name = $request->name;
        $shift->start_time = $request->start_time;
        $shift->end_time = $request->end_time;
        $shift->save();

        return response()->json([
            'message' => 'Success',
            'data' => $shift
        ]);
    }

    //destroy
    public function destroy($id)
    {
        $shift = shift::find($id);
        $shift->delete();

        return response()->json([
            'message' => 'Success',
            'data' => $shift
        ]);
    }

    //show
    public function show($id)
    {
        $shift = shift::find($id);

        return response()->json([
            'message' => 'Success',
            'data' => $shift
        ]);
    }
}

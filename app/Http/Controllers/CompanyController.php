<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//model companyInfo
use App\Models\companyInfo ;

class CompanyController extends Controller
{
    //constructor
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    //index
    public function index()
    {
        //where user_id, yg sedang login
        $company = companyInfo::where('id_user', auth()->user()->id)->get();
        
        //return response, dan juga info user yg sedang login, dengan message jg
        return response()->json([
            'company' => $company,
            'user' => auth()->user(),
            'message' => 'Retrieved successfully'
        ], 200);
    }

    //store
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            //$request->logo adalah file, yg diupload, harus gambar jpg, png, jpeg, JPG, PNG, JPEG, not required but harus gambar
            'logo' => 'image|mimes:jpg,png,jpeg,JPG,PNG,JPEG',
            
        ]);
        
        //beri default logo sebagai null
        $logo_name = null;

        //jika ada file logo yg diupload
        if($request->hasFile('logo')){
            //upload gambar ke folder logo, beri nama unik dengan time().extension, dan juga di depannya adalah id user yg sedang login
            $logo_extension = $request->logo->getClientOriginalExtension();
            $logo_name = auth()->user()->id.'_'.time().'.'.$logo_extension;
            $request->logo->move(public_path('logo'), $logo_name);
        }


        

        //create
        $company = companyInfo::create([
            'id_user' => auth()->user()->id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'province' => $request->province,
            'city' => $request->city,
            'industry' => $request->industry,
            'company_size' => $request->company_size,
            'npwp' => $request->npwp,
            'taxable' => $request->taxable,
            'tax_name' => $request->tax_name,
            'hq_initial' => $request->hq_initial,
            'umr' => $request->umr,
            'umr_province' => $request->umr_province,
            'bpjs_kesehatan' => $request->bpjs_kesehatan,
            'bpjs_ketenagakerjaan' => $request->bpjs_ketenagakerjaan,
            'description' => $request->description,
            'signature' => $request->signature,
            'logo' => $logo_name,
        ]);
        

        //return response, dan juga info user yg sedang login, dengan message jg
        return response()->json([
            'company' => $company,
            'user' => auth()->user(),
            'message' => 'Created successfully'
        ], 201);

    }

    //destroy
    public function destroy($id)
    {
        //find company berdasarkan id
        $company = companyInfo::find($id);
        
        //jika company tidak ditemukan
        if(!$company){
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        //jika company ditemukan, hapus
        $company->delete();

        //return response, dan juga info user yg sedang login, dengan message jg
        return response()->json([
            'user' => auth()->user(),
            'message' => 'Deleted successfully'
        ], 200);
    }

    //show
    public function show($id)
    {
        //find company berdasarkan id
        $company = companyInfo::find($id);
        
        //jika company tidak ditemukan
        if(!$company){
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        //return response, dan juga info user yg sedang login, dengan message jg
        return response()->json([
            'company' => $company,
            'user' => auth()->user(),
            'message' => 'Retrieved successfully'
        ], 200);
    }

    //update
    public function update(Request $request)
    {

        $id = $request->id;
        //validate
        $this->validate($request, [
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            //$request->logo adalah file, yg diupload, harus gambar jpg, png, jpeg, JPG, PNG, JPEG, not required but harus gambar
            'logo' => 'image|mimes:jpg,png,jpeg,JPG,PNG,JPEG',
            
        ]);
        
        //find company berdasarkan id
        $company = companyInfo::find($id);
        
        //jika company tidak ditemukan
        if(!$company){
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        //beri default logo sebagai null
        $logo_name = $company->logo;

        //jika ada file logo yg diupload
        if($request->hasFile('logo')){
            //upload gambar ke folder logo, beri nama unik dengan time().extension, dan juga di depannya adalah id user yg sedang login
            $logo_extension = $request->logo->getClientOriginalExtension();
            $logo_name = auth()->user()->id.'_'.time().'edited.'.$logo_extension;
            $request->logo->move(public_path('logo'), $logo_name);
        }

        //update
        $company->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'province' => $request->province,
            'city' => $request->city,
            'industry' => $request->industry,
            'company_size' => $request->company_size,
            'npwp' => $request->npwp,
            'taxable' => $request->taxable,
            'tax_name' => $request->tax_name,
            'hq_initial' => $request->hq_initial,
            'umr' => $request->umr,
            'umr_province' => $request->umr_province,
            'bpjs_kesehatan' => $request->bpjs_kesehatan,
            'bpjs_ketenagakerjaan' => $request->bpjs_ketenagakerjaan,
            'description' => $request->description,
            'signature' => $request->signature,
            'logo' => $logo_name,
        ]);

        //return response, dan juga info user yg sedang login, dengan message jg
        return response()->json([
            'company' => $company,
            'user' => auth()->user(),
            'message' => 'Updated successfully'
        ], 200);

    }
    
}

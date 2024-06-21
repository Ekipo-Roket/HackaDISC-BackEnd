<?php

namespace App\Http\Controllers\API\Multicompany;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Multicompany;

class MulticompaniesController extends Controller
{
    public function getMulticompanies(){
        try{
            $multicompanies = Multicompany::all();
            return response()->json($multicompanies);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function getMulticompany($id){
        try{
            $multicompany = Multicompany::find($id);
            return response()->json($multicompany);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}

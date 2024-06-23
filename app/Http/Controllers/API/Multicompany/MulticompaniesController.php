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
    public function getCompanyStats($id){
        try{
            $stats = [

                'main_company_id' => 1,
                "adaptability_to_change_before" => $adaptability_to_change_before = rand(0, 100),
                "adaptability_to_change_after" => $adaptability_to_change_after = rand(0, 100),
                "adaptability_to_change_difference" => $adaptability_to_change_after - $adaptability_to_change_before,

                "safe_conduct_before" => $safe_conduct_before = rand(0, 100),
                "safe_conduct_after" => $safe_conduct_after = rand(0, 100),
                "safe_conduct_difference" => $safe_conduct_after - $safe_conduct_before,

                "dynamsim_energy_before" => $dynamsim_energy_before = rand(0, 100),
                "dynamsim_energy_after" => $dynamsim_energy_after = rand(0, 100),
                "dynamsim_energy_difference" => $dynamsim_energy_after - $dynamsim_energy_before,

                "personal_effectiveness_before" => $personal_effectiveness_before = rand(0, 100),
                "personal_effectiveness_after" => $personal_effectiveness_after = rand(0, 100),
                "personal_effectiveness_difference" => $personal_effectiveness_after - $personal_effectiveness_before,

                "initiative_before" => $initiative_before = rand(0, 100),
                "initiative_after" => $initiative_after = rand(0, 100),
                "initiative_difference" => $initiative_after - $initiative_before,

                "working_under_pressure_before" => $working_under_pressure_before = rand(0, 100),
                "working_under_pressure_after" => $working_under_pressure_after = rand(0, 100),
                "working_under_pressure_difference" => $working_under_pressure_after - $working_under_pressure_before,

            ];
            return response()->json($stats);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}

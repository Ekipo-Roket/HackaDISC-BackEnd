<?php

namespace App\Http\Controllers\API\Workers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Evaluation;
use App\Models\Multicompany;
use Illuminate\Support\Facades\DB;

class WorkersController extends Controller
{
    public function getEvaluationWorkers(){
        try{
            $companys = Multicompany::orderBy('id')->get();
            
            $allcompany_evaluations = [];
            foreach($companys as $company)
            {
                $num_workers = Worker::where('company_id', $company->id)->count();
                if($num_workers < 1){continue;}
                $workers = Worker::where('company_id', $company->id)->get();
                $company_stat = [
                    'adaptability_to_change_before' => 0,
                    'adaptability_to_change_after'=> 0,
                    'adaptability_to_change_diff' => 0,
                    'safe_conduct_before' => 0,
                    'safe_conduct_after' => 0,
                    'safe_conduct_diff' => 0,
                    'dynamism_energy_before' => 0,
                    'dynamism_energy_after' => 0,
                    'dynamism_energy_diff' => 0,
                    'personal_effectiveness_before' => 0,
                    'personal_effectiveness_after' => 0,
                    'personal_effectiveness_diff' => 0,
                    'initiative_before' => 0,
                    'initiative_after' => 0,
                    'initiative_diff' => 0,
                    'working_under_pressure_before' => 0,
                    'working_under_pressure_after' => 0,
                    'working_under_pressure_diff' => 0,
                ];
                for($i=0; $i < $num_workers; $i++)
                {
                    $actual_worker = $workers[$i];
                    $num_evaluations = Evaluation::where('user_id',$actual_worker->id)->count();
                    if($num_evaluations <= 1){continue;}
                    $earliestEvaluation = Evaluation::where('user_id', $actual_worker->id)
                        ->orderBy('date', 'asc')
                        ->first();
                    $latestEvaluation  = Evaluation::where('user_id', $actual_worker->id)
                        ->orderBy('date', 'desc')
                        ->first();
                    $company_stat['adaptability_to_change_before'] += $earliestEvaluation->adaptability_to_change;
                    $company_stat['adaptability_to_change_after'] += $latestEvaluation->adaptability_to_change;
                    $company_stat['adaptability_to_change_diff'] += $latestEvaluation->adaptability_to_change - $earliestEvaluation->adaptability_to_change;
                    $company_stat['safe_conduct_before'] += $earliestEvaluation->safe_conduct;
                    $company_stat['safe_conduct_after'] += $latestEvaluation->safe_conduct;
                    $company_stat['safe_conduct_diff'] += $latestEvaluation->safe_conduct - $earliestEvaluation->safe_conduct;
                    $company_stat['dynamism_energy_before'] += $earliestEvaluation->dynamism_energy;
                    $company_stat['dynamism_energy_after'] += $latestEvaluation->dynamism_energy;
                    $company_stat['dynamism_energy_diff'] += $latestEvaluation->dynamism_energy - $earliestEvaluation->dynamism_energy;
                    $company_stat['personal_effectiveness_before'] += $earliestEvaluation->personal_effectiveness;
                    $company_stat['personal_effectiveness_after'] += $latestEvaluation->personal_effectiveness;
                    $company_stat['personal_effectiveness_diff'] +=  $latestEvaluation->personal_effectiveness - $earliestEvaluation->personal_effectiveness;
                    $company_stat['initiative_before'] += $earliestEvaluation->initiative;
                    $company_stat['initiative_after'] += $latestEvaluation->initiative;
                    $company_stat['initiative_diff'] += $latestEvaluation->initiative - $earliestEvaluation->initiative;
                    $company_stat['working_under_pressure_before'] += $earliestEvaluation->working_under_pressure;
                    $company_stat['working_under_pressure_after'] += $latestEvaluation->working_under_pressure;
                    $company_stat['working_under_pressure_diff'] +=  $latestEvaluation->working_under_pressure - $earliestEvaluation->working_under_pressure;
                }
                $allcompany_evaluations[] = [
                    'main_company_id' => $company->id,
                    'adaptability_to_change_before' => number_format($company_stat['adaptability_to_change_before'] / $num_workers,2),
                    'adaptability_to_change_after'=> number_format($company_stat['adaptability_to_change_after']/ $num_workers,2),
                    'adaptability_to_change_diff' => number_format($company_stat['adaptability_to_change_diff']/ $num_workers,2),
                    'safe_conduct_before' => number_format($company_stat['safe_conduct_before']/ $num_workers,2),
                    'safe_conduct_after' => number_format($company_stat['safe_conduct_after']/ $num_workers,2),
                    'safe_conduct_diff' => number_format($company_stat['safe_conduct_diff']/ $num_workers,2),
                    'dynamism_energy_before' => number_format($company_stat['dynamism_energy_before']/ $num_workers,2),
                    'dynamism_energy_after' => number_format($company_stat['dynamism_energy_after']/ $num_workers,2),
                    'dynamism_energy_diff' => number_format($company_stat['dynamism_energy_diff']/ $num_workers,2),
                    'personal_effectiveness_before' => number_format($company_stat['personal_effectiveness_before']/ $num_workers,2),
                    'personal_effectiveness_after' => number_format($company_stat['personal_effectiveness_after']/ $num_workers,2),
                    'personal_effectiveness_diff' => number_format($company_stat['personal_effectiveness_diff']/ $num_workers,2),
                    'initiative_before' => number_format($company_stat['initiative_before']/ $num_workers,2),
                    'initiative_after' => number_format($company_stat['initiative_after']/ $num_workers,2),
                    'initiative_diff' => number_format($company_stat['initiative_diff']/ $num_workers,2),
                    'working_under_pressure_before' => number_format($company_stat['working_under_pressure_before'],2),
                    'working_under_pressure_after' => number_format($company_stat['working_under_pressure_after'],2),
                    'working_under_pressure_diff' => number_format($company_stat['working_under_pressure_diff']/ $num_workers,2),
                ];
            }
            return response()->json($allcompany_evaluations);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function getWorkersByCompany($company_id){
        try{

            $workers = Worker::where('company_id', $company_id)->get();

            return response()->json($workers);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getWorker($id){
        try{
            $worker = Worker::find($id);
            return response()->json($worker);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getWorkersByArea($area_id){
        try{
            $workers = Worker::where('area_id', $area_id)->get();
            foreach ($workers as $worker) {
                $worker_id  = $worker->id;
                $evaluations = Evaluation::where('user_id', $worker_id)->orderby('date', 'desc')->get();

                $worker->evaluations = $evaluations;
            }

            return response()->json($workers);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function statusToInIntervention($id){
        try{
            $worker = Worker::find($id);
            $worker->stat_id = 2;
            $worker->save();
            return response()->json($worker);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function statusToIntervened($id){
        try{
            $worker = Worker::find($id);
            $worker->stat_id = 3;
            $worker->save();
            return response()->json($worker);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function statusToEvaluated($id){
        try{
            $worker = Worker::find($id);
            $worker->stat_id = 1;
            $worker->save();
            return response()->json($worker);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }


}

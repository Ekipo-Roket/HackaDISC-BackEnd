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


            $workers = Worker::all();

            foreach ($workers as $worker) {
                $company_id  = $worker->company_id;
                $company = Multicompany::find($company_id);
                $worker->company_name = $company->main_company_name;
                $worker->subcompany_name = $company->sub_company_name;

            }

            return response()->json($workers);
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

    public function getWorkersByArea($area_id,$company_id){
        try{
            $workers = Worker::where('area_id', $area_id)->where('company_id',$company_id)->get();
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

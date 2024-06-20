<?php

namespace App\Http\Controllers\API\Workers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Evaluation;

class WorkersController extends Controller
{
    public function getWorkers(){
        try{
            $workers = Worker::get();
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
    public function getWorkersByArea($area_id){
        try{
            //CAMBIAR AREA_NAME POR AREA_ID
            $workers = Worker::where('area_name', $area_id)->get();
            foreach ($workers as $worker) {
                $worker_id  = $worker->user_id;
                $evaluations = Evaluation::where('user_id', $worker_id)->get();
                $worker->evaluations = $evaluations;
            }

            return response()->json($workers);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}

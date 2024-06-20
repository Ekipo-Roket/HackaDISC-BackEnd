<?php

namespace App\Http\Controllers\API\Workers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;

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
            $workers = Worker::where('area_id', $area_id)->get();
            return response()->json($workers);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}

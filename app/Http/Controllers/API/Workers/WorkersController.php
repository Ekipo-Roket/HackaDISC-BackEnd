<?php

namespace App\Http\Controllers\Workers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;

class WorkersController extends Controller
{
    public function getAllWorkers(){
        try{
            $workers = Workers::get();
            return response()->json($workers);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function getWorkersByCompany($company_id){
        try{
            $workers = Workers::where('company_id', $company_id)->get();
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
}

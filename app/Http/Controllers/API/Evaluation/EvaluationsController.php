<?php

namespace App\Http\Controllers\API\Evaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evaluation;

class EvaluationsController extends Controller
{
    public function getEvaluationsByWorker($worker_id){
        try{
            $evaluations = Evaluation::where('user_id', $worker_id)->get();

            return response()->json($evaluations);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),s
            ], 500);
        }
    }
}

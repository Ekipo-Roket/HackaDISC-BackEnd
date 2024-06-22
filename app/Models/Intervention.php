<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;

    public function worker()
    {
        return $this->belongsTo(Worker::class, 'user_id', 'id');
    }
}
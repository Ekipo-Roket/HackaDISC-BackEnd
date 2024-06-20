<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;


    
    public function company()
    {
        return $this->belongsTo(Multicompany::class, 'company_id', 'main_company_id');
    }
    public function stat()
    {
        return $this->hasOne(Stat::class);
    }
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}




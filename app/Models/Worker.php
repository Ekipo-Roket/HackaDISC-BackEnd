<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;


    
    public function company()
    {
        return $this->belongsTo(Multicompany::class, 'company_id', 'id');
    }
    
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }
    public function stat()
    {
        return $this->belongsTo(Stat::class, 'stat_id', 'id');
    }
    public function interventions()
    {
        return $this->hasMany(Intervention::class);
    }
}




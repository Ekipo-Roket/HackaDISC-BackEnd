<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public function workers()
    {
        return $this->hasMany('App\Models\Worker');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'area_id', 'id');
    }
}

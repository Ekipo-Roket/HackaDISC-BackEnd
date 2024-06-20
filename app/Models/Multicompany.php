<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multicompany extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class, 'company_id', 'main_company_id');
    }
    public function workers()
    {
        return $this->hasMany('App\Models\Worker');
    }
}




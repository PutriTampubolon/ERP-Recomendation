<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FunctionArea extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function erp(){
        return $this->belongsToMany(Erp::class, 'function_area_erps')->withPivot('bobot');
    }
}

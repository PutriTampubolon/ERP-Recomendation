<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fungsionalitas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function erp(){
        return $this->belongsToMany(Erp::class, 'fungsionalitas_erps')->withPivot('bobot');
    }
}

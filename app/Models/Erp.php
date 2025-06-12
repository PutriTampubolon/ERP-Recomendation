<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Erp extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function modul(){
        return $this->belongsToMany(Modul::class, 'modul_erp')->withPivot('bobot');
    }

    public function fungsionalitas(){
        return $this->belongsToMany(Fungsionalitas::class, 'fungsionalitas_erps')->withPivot('bobot');
    }

    public function functionarea(){
        return $this->belongsToMany(FunctionArea::class, 'function_area_erps')->withPivot('bobot');
    }

    public function userneed(){
        return $this->hasOne(UserNeed::class);
    }

    public function type(){
        return $this->hasOne(Type::class);
    }

    public function otherrequirement(){
        return $this->hasOne(OtherRequirement::class);
    }

    public function erprecomendation(){
        return $this->hasOne(ErpRecomendation::class);
    }
}

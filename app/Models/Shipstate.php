<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shipdivision;
use App\Models\Shipdistrict;

class Shipstate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function division(){
    	return $this->belongsTo(Shipdivision::class,'shipdivision_id','id');
    }
    public function district(){
    	return $this->belongsTo(Shipdistrict::class,'shipdistrict_id','id');
    }
}

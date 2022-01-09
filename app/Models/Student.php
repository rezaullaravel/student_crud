<?php

namespace App\Models;
use App\Models\Classs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function classes(){
        return $this->belongsTo(Classs::class,'class_id');
    }
}

<?php

namespace App\Models;
use App\Models\Classs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function sections(){
        return $this->belongsTo(Classs::class,'class_id');
    }
}

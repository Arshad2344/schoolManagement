<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\softDeletes;

class Student extends Model
{
    use HasFactory;
    use softDeletes;
    public function teacher(){
        return $this->hasOne(Teacher::class, 'teacher_id');
    }
}

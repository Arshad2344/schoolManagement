<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\softDeletes;
use App\Models\Student;

class Teacher extends Model
{
    use HasFactory;
    use softDeletes;


    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

}

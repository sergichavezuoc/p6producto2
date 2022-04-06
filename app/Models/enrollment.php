<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enrollment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_enrollment';
    protected $fillable = ['id_student', 'id_course', 'status'];
    public function student()
    {
        return $this->belongsTo(students::class,'id_student','id');
        
    }
    public function course()
    {
    return $this->belongsTo(courses::class,'id_course','id_course');
    }
}

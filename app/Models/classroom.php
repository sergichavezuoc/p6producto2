<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classroom extends Model
{
    use HasFactory;
    protected $table="class";
    protected $primaryKey = 'id_class';
    protected $fillable = ['id_teacher','id_course', 'id_schedule', 'name','color'];
    public function teachers()
    {
        return $this->belongsTo(teachers::class,'id_teacher','id_teacher');
        
    }
    public function courses()
    {
    return $this->belongsTo(courses::class,'id_course','id_course');
    }
    public function schedule()
    {
    return $this->belongsTo(schedule::class,'id_schedule','id_schedule');
    }
    public function percentage()
    {
    return $this->hasOne(percentage::class,'id_class','id_class');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class percentage extends Model
{
    use HasFactory;
    protected $table="percentage";
    protected $primaryKey = 'id_percentage';
    protected $fillable = ['id_class', 'id_course', 'continuous_assessment','exams'];
    public $timestamps = false;
    public function class()
    {
    return $this->belongsTo(classroom::class,'id_class','id_class');
    }
    public function course()
    {
    return $this->belongsTo(courses::class,'id_course','id_course');
    }
}

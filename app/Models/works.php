<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class works extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_work';
    protected $fillable = ['id_class', 'id_student', 'name','mark'];
    public $timestamps = false;
    public function class()
    {
    return $this->belongsTo(classroom::class,'id_class','id_class');
    }
    public function student()
    {
    return $this->belongsTo(students::class,'id_student','id');
    }
}

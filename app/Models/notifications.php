<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    use HasFactory;
    protected $table="notifications";
    protected $primaryKey = 'id_notification';
    protected $fillable = ['id_student', 'work', 'exam', 'continuous_assessment','final_note'];
    public $timestamps = false;
    public function student()
    {
    return $this->belongsTo(students::class,'id_student','id');
    }

}

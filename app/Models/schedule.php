<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_schedule';
    protected $fillable = ['id_class', 'time_start', 'time_end','day'];
 
    public function class()
    {
    return $this->belongsTo(classroom::class,'id_class','id_class');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teachers extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_teacher';
    protected $fillable = [
        'name',
        'surname',
        'telephone',
        'nif',
        'email'
    ];
    public function classroom() {
        return $this->hasMany(classroom::class,'id_teacher');
    }
}

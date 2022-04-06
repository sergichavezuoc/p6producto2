<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'telephone','username','pass',   'surname',   'nif'];
    public function enrollments() {
        return $this->hasMany(enrollment::class,'id_student');
    }
}

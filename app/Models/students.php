<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;
    protected $table='users';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'telephone','username','password',   'surname',   'nif'];
    public function enrollments() {
        return $this->hasMany(enrollment::class,'id_student');
    }
}

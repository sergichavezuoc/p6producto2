<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
class students extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    protected $table='students';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'telephone','username','password',   'surname',   'nif'];
    public function enrollments() {
        return $this->hasMany(enrollment::class,'id_student');
    }
}

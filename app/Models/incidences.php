<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incidences extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_incidence';
    protected $fillable = ['id_incidence', 'id_student', 'description','response', 'incidence_read_at', 'response_read_at'];
    public $timestamps = false;
}

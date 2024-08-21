<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'grade',
        'gender',
        'track_id',
        'image',
        'address',
    ];
}

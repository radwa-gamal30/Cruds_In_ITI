<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class Track extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'duration',
        'logo'
    ];
}

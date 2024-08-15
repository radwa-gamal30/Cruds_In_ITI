<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'track_id',
        'track_name',
        'starts_at',
        'ends_at',
        'duration'

    ];


    public function tracks(){
        return $this->belongsToMany(Track::class);
    }
}

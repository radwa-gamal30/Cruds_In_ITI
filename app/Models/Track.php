<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Track extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'duration',
        'logo'
    ];
  
    public function scopeAllNames($query){
        return $query->pluck('name');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

}

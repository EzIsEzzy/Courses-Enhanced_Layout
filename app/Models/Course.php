<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CoursesFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'user_id',
        'field',
        'price',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

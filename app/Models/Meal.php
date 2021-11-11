<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'calories',
        'carbs',
        'fat',
        'protein',
        'sodium',
        'sugar',
        'meal_type',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

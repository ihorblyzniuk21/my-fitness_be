<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'calories',
        'carbs',
        'fat',
        'protein',
        'sodium',
        'sugar',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function scopeWhereName(Builder $builder, ?string $query)
    {
        return $query ? $builder->where('name', 'like', "%$query%") : $builder;
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['text','likes','dislikes', 'user_id', 'car_id'];

    protected $attributes = [
        'likes' => 0,
        'dislikes' => 0,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

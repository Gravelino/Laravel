<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['paymentMethod', 'amount', 'paymentDate'];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}

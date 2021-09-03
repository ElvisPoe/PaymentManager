<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = "clients";

    /**
     * Get the client payments
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get the client payments
     */
    public function lastPayment()
    {
        return $this->hasMany(Payment::class)->latest()->take(1);
    }

}

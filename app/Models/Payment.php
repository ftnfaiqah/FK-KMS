<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_ID';

    protected $fillable=[
    'payment_ID',
    'app_ID',
    'payment_amount',
    'payment_status',
    'payment_method',
    'payment_date'
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class, 'app_ID');
    }

    public function kiosk()
    {
        // Assuming you have a direct relationship between Payment and Kiosk
        // Adjust this based on your actual relationship
        return $this->belongsTo(Kiosk::class, 'kiosk_id');
    }
}

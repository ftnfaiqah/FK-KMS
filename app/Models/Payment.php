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

    public function application()
    {
        return $this->belongsTo(User::class, 'app_ID');
    }
}

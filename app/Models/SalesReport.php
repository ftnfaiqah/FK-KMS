<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReport extends Model
{
    use HasFactory;

    protected $primaryKey = 'sales_ID';

    protected $fillable=[
    'sales_ID',
    'kiosk_ID',
    'user_ID',
    'sales_year',
    'sales_month',
    'sales_modal',
    'sales_totalSales',
    'sales_profit',
    'sales_comment'
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_ID');
    }

    public function kiosk()
    {
        return $this->belongsTo(User::class, 'kiosk_ID');
    }
}

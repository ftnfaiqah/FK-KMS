<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kiosk extends Model
{
    use HasFactory;
    //tell our model what column we have in our table
    
    protected $primaryKey = 'kiosk_ID';

    protected $fillable=[
    'kiosk_ID',
    'kiosk_name',
    'kiosk_location',
    'kiosk_size',
    'kiosk_rent',
    'kiosk_status',
    'kiosk_rentDuration',
    'kiosk_img'
    ];    
}
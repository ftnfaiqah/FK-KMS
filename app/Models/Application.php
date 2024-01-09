<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    //tell our model what column we have in our table
    protected $primaryKey = 'app_ID';

    protected $fillable=[
        'app_ID',
        'user_ID',
        'kiosk_ID',
        'app_status'
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
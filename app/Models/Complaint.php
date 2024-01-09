<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $primaryKey = 'cmp_ID';

    protected $fillable=[
    'cmp_ID',
    'user_ID',
    'app_ID',
    'cmp_category',
    'cmp_evidence',
    'cmp_remark',
    'cmp_status',
    'cmp_assignTech',
    'cmp_progress'
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_ID');
    }

    public function application()
    {
        return $this->belongsTo(Application::class, 'app_ID');
    }

}

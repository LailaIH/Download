<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'discount', 'code', 'description', 'status', 'is_online',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

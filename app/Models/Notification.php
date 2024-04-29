<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'to_users', 'title', 'body', 'is_online', 'status',
    ];

    protected $casts = [
        'to_users' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

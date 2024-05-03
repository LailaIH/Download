<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;
    protected $table = 'job_titles';
    protected $fillable = [
         'job', 'description', 'is_online', 'status',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaAccount extends Model
{
    use HasFactory;
    protected $table = 'social_media_accounts';
    protected $fillable=['user_id','social_media_platform','is_online','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';
    protected $fillable=['type','price','description','is_online','status','duration'];

    public function users(){
        return $this->hasMany(User::class);
    }
}

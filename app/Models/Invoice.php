<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $fillable = ['invoice','user_id','is_online','payment_status','payment_date'
,'paid_amount','remain_amount'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

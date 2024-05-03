<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';
    protected $fillable=['user_id','file_url','file_size','file_type','download_source',
    'description','is_online','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }


}

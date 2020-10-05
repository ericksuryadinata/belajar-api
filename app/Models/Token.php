<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = ['id','user_id','token'];

    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}

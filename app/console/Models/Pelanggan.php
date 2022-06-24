<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $guarded = ['id'];

    public function golongan(){
        return $this->belongsTo(Golongan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

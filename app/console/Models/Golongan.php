<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $guarded = ['id'];

    public function pelanggan(){
        return $this->hasMany(Pelanggan::class);
    }
}

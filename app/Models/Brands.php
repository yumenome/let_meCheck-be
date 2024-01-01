<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function phones(){
        return $this->hasMany(Phone::class);
    }
}

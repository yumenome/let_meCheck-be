<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brand(){
        return $this->belongsTo(Brands::class);
    }

    public function prices(){
        return $this->hasMany(Price::class);
    }
    public function blog_reviews(){
        return $this->hasMany(BlogReivew::class);
    }
    public function Utude_reviews(){
        return $this->hasMany(UtudeReivew::class);
    }
    public function Conclusions(){
        return $this->hasMany(Conclusion::class);
    }
}

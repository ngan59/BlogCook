<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table="slide";

    protected $fillable=[
        'name',
        'image',
        'description',
        'sortNumber',
    ];
    public function imageUrl()
    {
        return '/image/slide/'.$this->image;
    }
}

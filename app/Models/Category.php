<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
    ];
    //danh mục thì có nhiều bài viết, 1 bài viết thì thuộc về danh mục
    public function dish()
    {
        return $this->hasMany(Dish::class,'id_category','id');
    }
}

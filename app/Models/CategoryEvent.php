<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryEvent extends Model
{
    protected $table = 'categoriesEvent';
    protected $fillable = [
        'name',
        'slug',
    ];
    //danh mục thì có nhiều bài viết, 1 bài viết thì thuộc về danh mục
    public function events()
    {
        return $this->hasMany(Event::class,'eventcategories_id','id');
    }
}

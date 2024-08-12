<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dish';
    protected $fillable = [
        'title',
        'summary',
        'description',
        'image',
        'video',
        'view_count',
        'user_id',
        'id_category',
        'new_post',
        'slug',
        'highlight_post',
        'status',
    ];

    //mỗi bài viết thuộc về 1 user
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'id_category','id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'id_dish','id');
    }
    public function imageUrl()
    {
        return '/image/dish/'.$this -> image;
    }
    
}

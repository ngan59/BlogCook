<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
       'comment_description',
       'rating',
        'user_id',
        'id_dish',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}

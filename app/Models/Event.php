<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'title',
        'image',
        'description',
        'eventcategories_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function categoryevent()
    {
        return $this->belongsTo(CategoryEvent::class, 'eventcategories_id', 'id');
    }

    public function imageUrl()
    {
        return '/image/event/'.$this->image;
    }
}

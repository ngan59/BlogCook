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
        'slug',
        'description',
        'eventcategories_id',
        'user_id',
        'start_date',
        'end_date',
        'location',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user');
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

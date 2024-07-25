<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    protected $fillable = [
    'report_reason',
    'status',
    'user_id',
    'id_comment',
    'id_dish',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }
    public function categoryreport()
    {
        return $this->belongsTo(CategoryReport::class,'id','id');
    }
}

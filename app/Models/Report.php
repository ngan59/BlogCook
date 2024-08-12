<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';

    protected $fillable = [
        'report_reason',
        'status',
        'user_id',
        'id_comment',
        'id_dish',
        'id_categoryreport',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'id_comment', 'id');
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class, 'id_dish', 'id');
    }

    public function categoryReport()
    {
        return $this->belongsTo(CategoryReport::class, 'id_categoryreport', 'id');
    }
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryReport extends Model
{
    protected $table = 'categoryreport';

    protected $fillable = [
        'name'
    ];
    public function report()
    {
        return $this->hasMany(Report::class,'id_categoryreport','id');
    }
}

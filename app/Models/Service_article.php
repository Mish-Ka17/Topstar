<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'order', 'active','slug'];

    protected $casts  = [
        'content' => 'json',
    ];
}

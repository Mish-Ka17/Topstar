<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    //use HasFactory;

    protected $fillable = ['title', 'active','slug'];

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function getRouteKeyName ()
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::saved(fn() => Cache::forget('site_menu'));
        static::deleted(fn() => Cache::forget('site_menu'));
    }
}

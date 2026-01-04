<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    //use HasFactory;
    protected $fillable = ['title', 'chapter_id', 'active','slug'];

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category_id', 'active','slug'];

    protected $casts  = [
        'content' => 'json',
    ];

    public function getRouteKeyName ()
    {
        return 'slug';
    }

    public function images()
    {
        return $this->hasMany(ArticleMedia::class)->orderBy('order');
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function scopeFilterCountry($query, $country)
    {
        if(!empty($country)){
            return $query->where('country_id',$country);
        }
        return $query;
    }
}

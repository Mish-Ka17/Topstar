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
    public function category()
    {
      return $this->belongsTo(Category::class);
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

    public function getTitleReversedAttribute(): string
    {
        $parts = preg_split('/\s+/', trim($this->title));

      if (count($parts) < 2) {
          return $this->title;
      }

      $lastName = array_pop($parts);

      return $lastName . ' ' . implode(' ', $parts);
    }

}

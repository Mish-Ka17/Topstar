<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\Chapter;

class MenuService
{
    public static function getMenu()
    {
        return Cache::rememberForever('site_menu', function()
        {

             return Chapter::with(['category'=> function($query)
             {
                 $query->orderBy('order');
             }])->orderBy('order')->get();
        });
    }

}

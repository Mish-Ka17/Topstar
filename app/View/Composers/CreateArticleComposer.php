<?php

namespace App\View\Composers;

use App\Models\Country;
use Illuminate\View\View;

class CreateArticleComposer
{
    /**
     * Создание нового компоновщика для шаблона создания статьи.
     *Назначение: подтягивается список стран для выпадающего списка стран <select>*/

    public function compose(View $view): void
    {
        $countries=Country::all();
        $view->with('countries', $countries);
    }
}

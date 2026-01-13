<?php

namespace App\Services;

use Illuminate\Support\Facades\Route;

class BreadcrumbsService
{
    public static function generate(): array
    {
        $crumbs = [];

        $route = Route::current();
        if (!$route) return $crumbs;

        $params = $route->parameters(); //dd($params);

        // Если есть Chapter (например /chapters/{chapter})
        if (isset($params['chapter'])) {
            $chapter = $params['chapter'];
            $crumbs[] = [
                'label' => $chapter->title,
                'url' => route('home', $chapter)  //route('chapters.show', $chapter)
            ];
        }

        // Если есть Category (например /chapters/{chapter}/categories/{category})
        if (isset($params['category'])) {
            $category = $params['category'];
            $crumbs[] = [
                'label' => $category->title,
                'url' => route('category.show', [$params['chapter'], $category])
            ];
        }

        // Если есть Article (например /chapters/{chapter}/categories/{category}/articles/{article})
        if (isset($params['article'])) {
            $article = $params['article'];
            $crumbs[] = [
                'label' => $article->title,
                'url' => route('article.show', [$params['chapter'], $params['category'], $article])
            ];
        }

        return $crumbs;
    }
}
?>

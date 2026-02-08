<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use Illuminate\Http\Request;

class PartsHtmlController extends Controller
{
    public function getAuthViews(Request $request) {
        $component_name = $request->context == 'registration'
            ? 'components.authmanager.registration'
            : 'components.authmanager.login';

        $html = view($component_name)->render();

        return response()->json(['html' => $html]);
    }

    /**
     * Возвращает HTML с точкой монтирования Vue и данными меню (аналогично getAuthViews).
     */
    public function getMenuView()
    {
        $menu = MenuService::getMenu();
        $menuForVue = $menu->map(function ($chapter) {
            return [
                'id' => $chapter->id,
                'title' => $chapter->title,
                'children' => $chapter->category->map(fn($category) => [
                    'id' => $category->id,
                    'title' => $category->title,
                    'href' => route('category.show', [$chapter, $category]),
                ])->values()->all(),
            ];
        })->values()->all();

        $menuJson = json_encode($menuForVue);
        $html = view('components.mobilemenu.mount-point', ['menuJson' => $menuJson])->render();

        return response()->json(['html' => $html]);
    }
}

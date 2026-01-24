<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function index() //Главная страница Chapter $chapter, Category $category)
    {
        $articles=Article::query()->where('nobel','2025')->orderBy('created_at')->get();

        $articlesPhysics=$articles->where('category_id',11);
        $articlesChemistry=$articles->where('category_id', 34);
        $articlesMedicine=$articles->where('category_id',35);

        if(Auth::user()){
            $user=Auth::user();
            return view('main',compact('user','articlesPhysics','articlesChemistry','articlesMedicine'));
        }
        return view('main',compact('articlesPhysics','articlesChemistry','articlesMedicine')); //,['chapter','category']); //'test-responsive'
    }

    public function categoryShow(Request $request,Chapter $chapter, Category $category)
    {
        $countryselected=$request->country;
        $countrySelectedTitle = '';

        $user=Auth::user();//dd($user);

        $articles = Article::query()->where('category_id',$category->id)->get();

        if($category->id==1){
            $articles_players = $articles->where('active',1);
            $articles_teams = $articles->where('active',0);

            return view('categoryShow', compact('user','chapter','category','articles_players','articles_teams','countryselected'));
        }
            else { //dd($articles->count());
            return view('categoryShowCommon', compact('user','chapter','category','articles','countryselected'));

        }
    }

    public function search(Request $request) //Поиск по сайту
    {
      $search=$request->search;
      if($search=='')
      {
        // return view('searchShow', compact('search'));
        return redirect()->back();
      }
      $articles=Article::where('title', 'LIKE', '%'.$search.'%')->get();
        if (Auth::user())
        {
          $user=Auth::user();
          return view('searchShow', compact('articles','search','user'));
        }
        return view('searchShow', compact('articles','search'));
    }

    public function alphabetIndex(Request $request) //Алфавитный указатель
    {//dd($request->letter);
        $query = Article::query();

        // Фильтр по букве
        // if ($request->filled('letter')) {
        //     $query->where('title', 'LIKE', $request->letter . '%');
        // }
        if ($request->filled('letter')) {
            $query->whereRaw("
                SUBSTRING_INDEX(title, ' ', -1) LIKE ?
            ", [$request->letter.'%']);
        }

        // // Поиск по имени
        // if ($request->filled('q')) {
        //     $query->where('name', 'LIKE', '%' . $request->q . '%');
        // }

        $articles = $query->orderBy('title')->get(); //paginate(24);
        $search=$request->letter;

        return view('searchShow', compact('articles','search'));
    }

}

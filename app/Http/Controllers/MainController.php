<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Category;
use App\Models\Article;
use App\Models\Service_article;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
  public function index() //Главная страница
  {

    $aboutProject=Service_article::query()->where('order',1)->first();  //краткий текст "О нас"

    $query=Article::query();

    $articlesLatest=(clone $query)->whereNull('nobel')->latest()->take(10)->get(); // последние 10 публикаций (статей)

    $articles=(clone $query)->where('nobel','2025')->orderBy('created_at')->get(); //нобелевские лауреаты

    $articlesPhysics=$articles->where('category_id',11);    //нобелевские лауреаты по отраслям науки
    $articlesChemistry=$articles->where('category_id', 34);
    $articlesMedicine=$articles->where('category_id',35);

    if(Auth::user()){
        $user=Auth::user();
        return view('main',compact('user','aboutProject','articlesLatest','articlesPhysics','articlesChemistry','articlesMedicine'));
    }
    return view('main',compact('aboutProject', 'articlesLatest','articlesPhysics','articlesChemistry','articlesMedicine')); //,['chapter','category']); //'test-responsive'
  }

  public function aboutProjectShow () // Cтраница "О нас" (about-project-show.blade.php) - полный текст
  {
    $aboutProjectShow=Service_article::query()->where('order',2)->first();

    if(Auth::user()){
        $user=Auth::user();
        return view('about-project-show', compact('user','aboutProjectShow'));
    }
    return view('about-project-show', compact('aboutProjectShow'));

  }

  public function categoryShow(Request $request,Chapter $chapter, Category $category)
  {
      $countryselected=$request->country;
      $countrySelectedTitle = '';

      $user=Auth::user();

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
  {
      $query = Article::query();

      if ($request->filled('letter')) {
          $query->whereRaw("
              SUBSTRING_INDEX(title, ' ', -1) LIKE ?
          ", [$request->letter.'%']);
      }

      $articles = $query->orderBy('category_id','DESC')->orderBy('title')->get(); //paginate(24);

      $arr_articles=[];
      foreach($articles as $article)
      {
        $category_title=$article->category->title;
        $arr_articles[$category_title][]=$article;
      }
      ksort($arr_articles);

      $search=$request->letter;

      if (Auth::user())
      {
        $user=Auth::user();
        return view('alphabet-show', compact('search','user','arr_articles'));
      }

      return view('alphabet-show', compact('search','arr_articles'));
  }

}

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
    public function index() //Chapter $chapter, Category $category)
    {
        if(Auth::user()){
            $user=Auth::user();
            return view('main',compact('user'));
        }
        return view('main'); //,['chapter','category']); //'test-responsive'
    }

    public function categoryShow(Request $request,Chapter $chapter, Category $category)
    {
        $countryselected=$request->country;

        $user=Auth::user();//dd($user);

        $articles = Article::query()->where('category_id',$category->id)->get();

        if($category->id==1){
            $articles_players = $articles->where('active',1);
            $articles_teams = $articles->where('active',0);

            return view('categoryShow', compact('user','chapter','category','articles_players','articles_teams','countryselected'));
        }
            else {
            return view('categoryShowCommon', compact('user','chapter','category','articles','countryselected'));

        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;
use App\Models\Chapter;
use App\Models\Country;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function store(Request $request)
    {//dd($request->slug);
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|array',
            'slug' => 'required|string',
        ]);

        $category_id = $request->category;
        $country_id=$request->country;
        $content = [];

        foreach ($request->content as $index => $block) {

            // PARAGRAPH
            if ($block['type'] === 'paragraph') {
                $content[] = [
                    'type' => 'paragraph',
                    'text' => $block['text'],
                ];
            }

            // HEADING
            if ($block['type'] === 'heading') {
                $content[] = [
                    'type' => 'heading',
                    'level' => $block['level'],
                    'text' => $block['text'],
                ];
            }

            // IMAGE or VIDEO (file upload)
            if (in_array($block['type'], ['image', 'video'])) {

                if (isset($block['file'])) {
                    $path = $block['file']->store("articles", "public");
                }

                $item = [
                    'type' => $block['type'],
                    'src' => "/storage/" . $path,
                ];

                if ($block['type'] === 'image') {
                    $item['position'] = $block['position'];
                    $item['caption'] = $block['caption'];
                }

                $content[] = $item;
            }
        }
//dd($content);
            Article::create([
            'category_id' => $category_id,
            'country_id'=>$country_id,
            'title' => $request->title,
            'content' => $content,
            'slug' => $request->slug,
        ]);
//dd($row);
        $title = $request->title;

        return view('articleShow', compact(['title','content']));
    }

    public function articleShow (Chapter $chapter, Category $category, Article $article)
    {//dd($article->country);
        $user=Auth::user();
        $country=$article->country->title;
        $title = $article->title;
        $content = $article->content;
        $articleid=$article->id;

        $comments=Comment::query()->where('article_id',$article->id)->get();
// dd($comments->user_id);
        return view('articleShow', compact('user','articleid','country','title', 'content','comments'));
    }

    // Фильтр по стране
    public function index(Request $request, Chapter $chapter, Category $category)
    {
        $user=Auth::user();
        if(!$request->country==''){
            $articles = Article::query()->where('category_id',$category->id)
                            ->where('country_id',$request->country);
        }
            else {
            $articles = Article::query()->where('category_id',$category->id);
        };

        $countrySelectedTitle= $request->country ? Country::where('id', $request->country)->get()->first()->title : '';
        $countryselected=$request->country;

        $articles=$articles->get();

        if($category->id==1){
            $articles_players = $articles->where('active',1);
            $articles_teams = $articles->where('active',0);

            return view('categoryShow', compact('user','chapter','category','articles_players','articles_teams','countryselected','countrySelectedTitle'));
        }
            else {
            return view('categoryShowCommon', compact('user','chapter','category','articles','countryselected','countrySelectedTitle'));
        }

/****************************** */
         //Отслеживаем URL для включения компонента фильтрации по стране <filtercountry/>
         //$route=Route::current()->uri; //это строка: 'filtercountry/{chapter}/{country}'

        //Отслеживаем id выбранной страны (для фильтра по стране, чтобы выбор страны
        // сохранялся при обновлении страницы):

    }

    public function addcomment(Request $request)
    {
        if(!Auth::check())
            {
                return back();
            }
        $validated=$request->validate([
            'content'=>['required','string','max:255']
        ]);
        $user=Auth::user();
        // dd($user,$request);
        Comment::create([
            'article_id'=>$request->article_id,
            'user_id'=>$user->id,
            'content'=>$validated['content'],
            'active'=>1,
        ]);

        return redirect()->back();
    }

    public function store_old(Request $request)
    {    // dd($request->images);
         $validated = $request->validate([
             'title'       => 'required|string|max:255',
             'content'     => 'required|string',
             'images.*'    => 'nullable|image|max:5120',
             'category' => 'required',
         ]);

         $article = Article::create([
             'category_id' => $validated['category'], //$request->category,
             'title'   => $validated['title'],
             'content' => $validated['content'],
             'active' => 1,
         ]);

        //dd($request->file('images'));


        // Загружаем изображения и связываем с записью
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $path = $file->store('articles', 'public');

                //dd($path);
                //dd($file);
                 ArticleMedia::create([
                     'article_id' => $article->id,
                     'path' => $path,
                     //'order' => $index,
                     //'type'  => $file->type,
                 ]);
            }
        }

        $content = $this->insertMedia($article->content, $article);
        return view('articleShow', compact('article', 'content'));
    }

/************************************** */

    public function articleEdit(Article $article)
    {//dd($article);
        //$content = $article['content']; //dd($content);
        //$content = $this->insertMedia($article->content, $article);
        return view('admin.articles.edit', compact('article'));
    }

    protected function insertMedia($text, $article)
    {
        $text = preg_replace_callback('/\[image:(\d+)\]/', function ($matches) use ($article) {
            $index = (int)$matches[1] - 1;
            $image = $article->images[$index] ?? null;

            if (!$image) return '';

            return "<div class='my-6'>
                <p>
                <img src='".asset('storage/'.$image->path)."'
                    alt=''
                    class='float-left mr-5 mb-3 rounded-xl shadow-md w-72 h-auto object-cover'>

                <form method='POST' action=''>
                    <label class='block mb-2 font-semibold'>Подпись</label>
                    <input type='text' name='caption' class='w-full border rounded p-2'>
                    <button type='submit'
                        class='bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded transition'>
                        Сохранить подпись
                    </button>
                </form>
                </p>
            </div>";
        }, $text);
//dd($text.'weqweqw');
        return $text;
    }

}

<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);

        $this->middleware('auth', ['expect' => ['index', 'show']]);
    }

    public function index()
    {
//        $title = '文章标题1';
//        $title = '<span style="color: red;">文章</span>标题1';
//        $intro = '文章一的简介';
//        return view('articles.lists')->with('title', $title);
//        return view('articles.lists', ['title'=>$title]);
//        $first = ['jelly', 'bool'];

        $articles = Article::latest()->Published()->get();

        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        /*$article = Article::find($id);
        if (is_null($article)) {
            abort(404);
        }*/
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $tags = Tag::lists('name','id');
        return view('articles.create', compact('tags'));
    }

    public function store(Requests\StoreArticleRequest $request)
    {
        $input = $request->all();
        $input['introduction'] = mb_substr($request->get('content'),0,64);
        $article = Article::create($input);
        $article->tags()->attach($request->input('tag_list'));

        return redirect('article');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $tags = Tag::lists('name','id');

        return view('articles.edit', compact('article','tags','id'));
    }

    public function update(Requests\StoreArticleRequest $request, $id)
    {
        $article = Article::findorFail($id);
        $article->update($request->all());
        $article->tags()->sync($request->input('tag_list'));

        return redirect('article');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()  
    {
        //$this->middleware(['auth:api'], ['except' => []]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->paginate) {
            return new ArticleResource(Article::paginate($request->paginate));
        }
        /*$article = Article::all();
        return ArticleResource::collection($article);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->image = $request->image;
        $article->save();

        return "created";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->description = $request->description;
        $article->image = $request->image;
        $article->save();

        return 'Updated';
    }

    // trashed
    public function trashed() {
        $article = Article::onlyTrashed()->get();
        return ArticleResource::collection($article);
    }

    // delete
    public function destroy($id) {
        $article = Article::withTrashed()
        ->where('id', $id);
        $article->delete();
        return 'delete';
    }

    // restore
    public function restore($id) {
        $article = Article::onlyTrashed()
        ->where('id', $id);
        $article->restore();
        return 'restore';
    }

    // forced
    public function forced($id) {
        $article = Article::onlyTrashed()
        ->where('id', $id);
        $article->forceDelete();
        return 'forced';
    }
}

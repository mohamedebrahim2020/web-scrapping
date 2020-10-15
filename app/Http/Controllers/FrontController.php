<?php

namespace App\Http\Controllers;

use App\Article;

use App\Website;


class FrontController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(5);

        return view('Article')->withArticles($articles);
    }

    public function web()
    {
        $websites = Website::orderBy('id', 'DESC')->paginate(10);

        return view('website', ['websites' => $websites]);
    }

    public function getArticleDetails($id)
    {

        $article = Article::find($id);

        return view('details', ['article' => $article]);
    }
}

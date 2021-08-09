<?php

namespace Frontend\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends FrontendController
{
    private $news;
    public function __construct(News $news)
    {
        parent::__construct();
        $this->news = $news;
    }
    public function index()
    {
        $news =  $this->news->paginate(8);
        return view('frontend::news.news',compact('news'));
    }

    public function detail($id)
    {
        $news = $this->news->newQuery()->limit(3)->get();
        $newsDetail = $this->news->find($id);
        return view('frontend::news.newsDetail',compact('newsDetail','news'));
    }
}

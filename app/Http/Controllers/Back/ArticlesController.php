<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\StoreArticlesPost;
use App\Repositories\Articles\ArticleCategoryRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Articles\ArticlesRepository;

class ArticlesController extends CommonController
{

    protected $Articles;
    protected $Category;

    public function __construct(ArticlesRepository $Articles, ArticleCategoryRepository $Category)
    {
        parent::__construct();
        $this->Articles = $Articles;
        $this->Category = $Category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Back.Articles.index', ['list' => $this->Articles->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.Articles.create', ['category' => $this->getCategory()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticlesPost $request)
    {
        $this->Articles->create($request->all());
        return redirect('/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //上传文章封面图
    public function articleCover(Request $request)
    {
        $path = $request->file('file')->store('public/articleCover/' . Carbon::now()->toDateString());
        return Storage::url($path);
    }

    //编辑器上传文章内容图
    public function articleEdit(Request $request)
    {
        $path = $request->file('file')->store('public/articleEdit/' . Carbon::now()->toDateString());
        return array('link' => Storage::url($path));
    }

    /**
     * 获取文章分类
     */
    private function getCategory()
    {
        return $this->Category->all();
    }
}

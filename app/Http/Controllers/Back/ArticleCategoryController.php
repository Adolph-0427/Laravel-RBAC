<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\StoreArticleCategoryPost;
use Illuminate\Http\Request;
use App\Repositories\Articles\ArticleCategoryRepository;

class ArticleCategoryController extends CommonController
{
    protected $Category;

    public function __construct(ArticleCategoryRepository $Category)
    {
        parent::__construct();
        $this->Category = $Category;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Back.ArticleCategory.index', ['list' => $this->Category->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('Back.ArticleCategory.create', ['pid' => $request->input('pid'), 'level' => $request->input('level') + 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleCategoryPost $request)
    {
        $this->Category->create($request->all());

        return redirect('/articleCategory');
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
        return view('Back.ArticleCategory.edit', ['info' => $this->Category->find($id)]);
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
        $this->Category->update($request->all(), array('id' => $id));
        return redirect('/articleCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Category->delete($id);
        return redirect('/articleCategory');
    }
}

<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Repositories\Access\MenuRepository;

class MenuController extends CommonController
{

    protected $Menu;

    public function __construct(MenuRepository $Menu)
    {
        parent::__construct();
        $this->Menu = $Menu;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pid = (int)$request->get('pid');
        return view('Back.Menu.index', ['list' => $this->Menu->paginate(array('pid'=>$pid))]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $parent_id = $request->get('pid');

        return view('Back.Menu.create', ['parent' => $this->Menu->find($parent_id)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Menu->create($request->all());
        return redirect('/menu');
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
        return view('Back.Menu.edit', ['info' => $this->Menu->find($id)]);
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
        $this->Menu->update($request->all(), array('id' => $id));
        return redirect('/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Menu->delete($id);
        return redirect('/menu');
    }
}

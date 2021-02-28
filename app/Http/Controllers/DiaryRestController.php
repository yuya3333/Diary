<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DiaryRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $current_user = Auth::user();

        return view('index', ['current_user' => $current_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_user = Auth::user();
        return view('create', ['current_user' => $current_user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_user = Auth::user();

        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->user_id = $current_user->id;
        $article->save();
        return redirect('/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $current_user = Auth::user();

        $article = Article::find($id);
        return view('show', ['current_user' => $current_user, 'article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_user = Auth::user();

        $article = Article::find($id);
        return view('edit', ['current_user' => $current_user, 'article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $current_user = Auth::user();

        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->user_id = $current_user->id;
        $article->save();
        return redirect('/article');
//        return redirect()->route('article');
//        return redirect()->route('/article', [$id]);
//        return view('/article/$id');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect('/article');
    }
}

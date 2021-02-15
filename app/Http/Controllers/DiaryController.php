<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class DiaryController extends Controller
{
    public function index(Request $request)
    {
        $items = Article::all();
        return view('index', ['items' => $items]);
    }
}

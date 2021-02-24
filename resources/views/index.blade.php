@extends('layouts.layout')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    @if (Auth::check())
    <p>USER: {{$current_user->name . ' (' . $current_user->email . ')'}}</p>
    @else<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
    @endif

    <table>
    <tr><th>タイトル</th></tr>
    <tr>
        <td>
        @if ($current_user->articles != null)
            <table>
            @foreach ($current_user->articles as $article)
                <tr><td><a href="/article/{{$article->id}}">{{$article->title}}</a></td></tr>
            @endforeach
            </table>
        @endif
        </td>
    </tr>
    </table>
    <input type="button" onclick="location.href='/article/create'" value="記事追加">

@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
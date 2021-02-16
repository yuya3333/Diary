@extends('layouts.layout')

@section('title', 'show')

@section('menubar')
    @parent
    詳細ページ
@endsection

@section('content')
    @if (Auth::check())
    <p>USER: {{$current_user->name . ' (' . $current_user->email . ')'}}</p>
    @else<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
    @endif

    <table>
    <tr><th>タイトル</th><th>記事</th></tr>
    <tr>
        <td>
            <table width="100%">
            <tr><td>{{$article->title}}</td>
            <td>{{$article->content}}</td></tr>
            </table>
        </td>
    </tr>
    </table>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
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
    <tr><th>名前</th><th>タイトル</th><th>記事</th></tr>
    @foreach ($users as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->article->title}}</td>
        <td>{{$user->article->content}}</td>
    </tr>
    @endforeach
    </table>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
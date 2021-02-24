@extends('layouts.layout')

@section('title', 'edit')

@section('menubar')
    @parent
    編集ページ
@endsection

@section('content')
    @if (Auth::check())
    <p>USER: {{$current_user->name . ' (' . $current_user->email . ')'}}</p>
    @else<p>※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)</p>
    @endif

    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/article/{{$article->id}}" method="POST">
    <table>
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="{{$article->id}}">

        <tr><th>title: </th><td><input type="text" name="title" value="{{ $article->title }}"></td></tr>
        <tr><th>content: </th><td><textarea name="content" >{{$article->content}}</textarea></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>
    <form action="/article/{{$article->id}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" class="btn btn-danger mt-3" value="削除"/>
    </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
@extends('layouts.layout')

@section('title', 'delete')

@section('menubar')
    @parent
    削除ページ
@endsection

@section('content')
    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/article/{{$article->id}}" method="post">
    <table>
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="{{$article->id}}">

        <tr><th>title: </th><td>{{$article->title}}</td></tr>
        <tr><th>content: </th><td>{{$article->content}}</td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
@extends('layouts.layout')

@section('title', 'add')

@section('menubar')
    @parent
    日記追加ページ
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
    <form action="/article" method="post">
    <table>
        @csrf
        <tr><th>title: </th><td><input type="text" name="title" value="{{old('title')}}"></td></tr>
        <tr><th>content: </th><td><textarea name="content" value="{{old('content')}}"></textarea></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>        
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
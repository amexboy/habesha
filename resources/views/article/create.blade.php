@extends('layout.main')

@section('title', 'New Article')

@section('content')
    @parent

    <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"></textarea>
@endsection

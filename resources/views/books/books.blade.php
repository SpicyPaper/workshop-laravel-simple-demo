@extends('layout.app')

@section('content')
@foreach ($books as $book)

    {{$book->title}}
    {{$book->pages}}
    {{$book->quantity}}

@endforeach
@endsection
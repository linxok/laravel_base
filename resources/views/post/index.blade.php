@extends('layouts.main')
@section('content')
    <div>
        <div class="btn btn-primary">
            <a href="{{route ('post.create')}}">Add one</a>
        </div>

        @foreach($posts as $post)
            <div>
                <a href="{{ route('post.show', $post->id) }}">{{ $post->id }} . {{$post->title}}</a>
            </div>
        @endforeach
    </div>
    <div class="mt-3">
        {{$posts->withQueryString()->links()}}
    </div>
@endsection

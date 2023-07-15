@extends('layouts.main')
@section('content')
    <div>
        <div>
            <div>{{ $post->id }} . {{$post->title}}</div>
            <div>{{ $post->content }}</div>
            <img src="{{$post->image}}" alt="image" height="60" width="60">
        </div>
        <div class="btn btn-primary">
            <a href="{{ route('post.edit', $post->id) }}">edit</a>
        </div>
        <div class="btn btn-primary">
            <form action="{{ route('post.delete', $post->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>

        </div>

    </div>
@endsection

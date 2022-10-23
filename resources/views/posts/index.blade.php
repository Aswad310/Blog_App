@extends('layouts.app')
@section('content')
    <h1>Blogs</h1>
{{--    {{dd($posts)}}--}}
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card p-4 mt-4">
                <div class="row">
                    <div class="col-md-4">
                        <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width: 100%">
                    </div>
                    <div class="col-md-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Profile: <a href="/profile/{{$post->user_id}}">{{$post->user_name}}</a></small> <br>
                        <small>Written on {{$post->created_at->format('F jS , Y - h:i:s A')}}</small>
                    </div>
                </div>
            </div>
        @endforeach
    @else
    @endif
@endsection

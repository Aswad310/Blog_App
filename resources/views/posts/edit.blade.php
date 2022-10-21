@extends('layouts.app')
@section('content')
    <a href="/posts/{{$posts->id}}" class="btn btn-default">&#128072 Go Back</a>
    <form method="POST" action="/posts/{{$posts->id}}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-8 offset-2 p-5" style="background: white;">
                <div class="row">
                    <h1>Edit Blog</h1>
                    <small class="mt-2">
                        <b>Blog Name:</b> <a href="/posts/{{$posts->id}}">{{$posts->title}}</a>
                        <span class="me-3"></span>
                        <b>Written on:</b> <a href="#">{{$posts->created_at->format('F jS , Y - h:i:s A')}}</a>
                    </small>
                </div>
                <div class="row mt-3 mb-4">
                    <label for="title" class="col-md-4 col-form-label"><b>Current Blog Title</b></label>
                    <input id="title"
                           type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           name="title"
                           value="{{$posts->title}}"
                           value="{{ old('title') }}"
                           autocomplete="title" autofocus>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="body" class="col-md-4 col-form-label"><b>Current Blog Body</b></label>

                    <textarea id=""
                              class="form-control @error('body') is-invalid @enderror"
                              name="body"
                              value="{{$posts->body}}"
                              value="{{ old('body') }}"
                              autocomplete="body" autofocus
                              rows="8" cols="50">
                    </textarea>
                    @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{--                <div class="row">--}}
                {{--                    <label for="image" class="col-md-4 col-form-label">Post Image</label>--}}
                {{--                    <input type="file" class="form-control" id="image" name="image">--}}

                {{--                    @error('image')--}}
                {{--                    <strong>{{ $message }}</strong>--}}
                {{--                    @enderror--}}
                {{--                </div>--}}

                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary update-alert">Update Blog</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.update-alert').click(function(){
                if(confirm('Do you want really want to update the blog post?')){
                    return true;
                }else{
                    return false;
                }
            });
        });

        ClassicEditor
            .create( document.querySelector( '#toolbar' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection

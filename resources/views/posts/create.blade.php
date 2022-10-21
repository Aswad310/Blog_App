@extends('layouts.app')
@section('content')
    <form method="POST" action="/posts" enctype="multipart/form-data">
        @csrf
        <a href="/posts/" class="btn btn-default">&#128072 Go Back</a>
        <div class="row">
            <div class="col-8 offset-2 p-5" style="background: white;">
                <div class="row">
                    <h1>Create Post</h1>
                </div>

                <div class="row mt-3 mb-4">
                    <label for="title" class="col-md-4 col-form-label"><b>Blog Title <span style="color: red">*</span> </b></label>

                    <input id="title"
                           type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           name="title"
                           placeholder="Title"
                           value="{{ old('title') }}"
                           autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="body" class="col-md-4 col-form-label"><b>Blog Body <span style="color: red">*</span></b></label>

                    <textarea id=""
                           class="form-control @error('body') is-invalid @enderror"
                           name="body"
                           value="{{ old('body') }}"
                           placeholder="Body"
                           autocomplete="body" autofocus
                           rows="8" cols="50">
                    </textarea>

                    @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="cover_image" class="col-md-4 col-form-label"></label>
                    <input type="file" class="form-control" id="cover_image" name="cover_image">

                    @error('cover_image')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary create-alert">Create Blog</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.create-alert').click(function(){
                if(confirm('Do you want really want to delete the blog post?')){
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

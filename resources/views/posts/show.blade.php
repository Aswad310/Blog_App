@extends('layouts.app')
@section('content')
    <a href="/posts" class="btn btn-default">&#128072 Go Back</a>
    <div class="row">
        <div class="col-8 offset-2 p-5" style="background: white;">
            <form method="POST" action="{{ url('/posts' . '/' .$post->id) }}">
                @method('DELETE')
                @csrf
                <h1>{{$post->title}}</h1>
                @if(!auth::guest()) {{-- edit & del btn will show if user is not guest --}}
                    @if(auth::user()->id == $post->user_id) {{-- if user is login then edit & del btn only shows on there posts to them --}}
                    <small>
                        <table>
                            <tr>
                                <td>
                                    <a href="/posts/{{$post->id}}/edit" style="text-decoration: none; " class="me-2">Edit Blog</a>
                                    <i class="fa-sharp fa-solid fa-pencil" style="color: #2192EC"></i>
                                </td>
                                <td>
                                    <input type="submit" style="color: red ;" class="btn btn-default delete-alert" value="Delete">
                                    <i class="fa-regular fa-trash-can" style="color: red"></i>
                                </td>
                            </tr>
                        </table>
                    </small>
                    @endif
                @endif
                <div class="col-md-12 mt-2">
                    <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width: 100%">
                </div>
                <hr>
                <p style="font-size: 17px">{{$post->body}}</p>
                <hr>
                <small>
                    Written on <b>{{$post->created_at->format('F jS , Y - h:i:s A')}}</b>
                </small>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.delete-alert').click(function(){
                if(confirm('Do you want really want to delete the blog post?')){
                    return true;
                }else{
                    return false;
                }
            });
        });
    </script>
@endsection

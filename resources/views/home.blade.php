@extends('layouts.app')

@section('content')
    <a href="/posts/" class="btn btn-default">&#128072 Go Back</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{'Dashboard - '.auth()->user()->name}}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <h3 class="mt-4">Your Blog Posts</h3>
                    @if(count($user_posts) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Edit Blogs</th>
                                    <th>Delete Blogs</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user_posts as $user_post)
                                <tr>
                                    <td><a href="/posts/{{$user_post->id}}">{{$user_post->title}}</a></td>
                                    <td>
                                        <a href="/posts/{{$user_post->id}}/edit" style="text-decoration: none; " class="me-2">Edit</a>
                                        <i class="fa-sharp fa-solid fa-pencil" style="color: #2192EC"></i>
                                    </td>
                                    <td>
                                        <input type="submit" style="color: red ;" class="btn btn-default delete-alert" value="Delete">
                                        <i class="fa-regular fa-trash-can" style="color: red"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    @else
                        <td colspan="3" style="text-align: center">You have no blogs till now.</td>
                        </table>
                    @endif
                </div>
            </div>
        </div>
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

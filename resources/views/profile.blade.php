{{--{{dd($profile)}}--}}
@extends('layouts.app')
@section('content')
    <a href="/posts/" class="btn btn-default">&#128072 Go Back</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile: <b>{{$user_name}}</b></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($profiles) > 0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Created at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($profiles as $profile)
                                    <tr>
                                        <td><a href="/posts/{{$profile->id}}">{{$profile->title}}</a></td>
                                        <td>{{$profile->created_at->format('F jS , Y - h:i:s A')}}</td>
                                @endforeach
                                </tbody>
                                @else
                                    <td colspan="2" style="text-align: center">You have no blogs till now.</td>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

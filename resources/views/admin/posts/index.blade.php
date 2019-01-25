@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    @if(Session::has('deleted_user'))

<p class="bg-danger">{{session('deleted_user')}}</p>

@endif

    <table class="table">
        <thead>
          <tr>
            <th>Photo</th>
            <th>Id</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>View post</th>
            <th>Comments</th>
            <th>Created at</th>
            <th>update</th>
           
          </tr>
        </thead>
        <tbody>
            @if($posts)

            @foreach ($posts as $post)
                
            
            <tr>
                <td><img height="50" src="{{$post->photo  ? $post->photo->file : 'https://vignette.wikia.nocookie.net/project-pokemon/images/4/47/Placeholder.png/revision/latest?cb=20170330235552'}} " alt=""></td>
                <td>{{$post->id}}</td>
                <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                <td>{{$post->title}}</td>
                <td>{{str_limit($post->body,20)}}</td>
                <td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>
                <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
                <td>{{$post->created_at->diffForhumans()}}</td>
                <td>{{$post->updated_at->diffForhumans()}}</td>

            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
    
    
@stop
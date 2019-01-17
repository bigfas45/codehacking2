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
            <th>Created</th>
            <th>Updated</th>
           
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
                <td>{{$post->created_at->diffForhumans()}}</td>
                <td>{{$post->updated_at->diffForhumans()}}</td>

            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    
    
@stop
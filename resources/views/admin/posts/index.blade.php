@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

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
                <td>{{$post->user->name}}</td>
                <td>{{$post->category_id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at->diffForhumans()}}</td>
                <td>{{$post->updated_at->diffForhumans()}}</td>

            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    
    
@stop
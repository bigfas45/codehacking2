@extends('layouts.admin')

@section('content')



<h1>Categories</h1>
@if(Session::has('deleted_cat'))

<p class="bg-danger">{{session('deleted_cat')}}</p>

@endif
<div class="col-sm-8">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
          
          <div class="form-group">
            {!! Form::submit('Create Category',  ['class'=>'btn btn-primary']) !!}
          </div>
    
    
        {!! Form::close() !!}
</div>
<div class="col-sm-4">
        <table class="table">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Created Date</th>
                    
                   
                  </tr>
                </thead>
                <tbody>
                    @if($categories)
        
                    @foreach ($categories as $category)
                        
                    
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Date'}}</'td>
                        
        
                    </tr>
                    @endforeach
                    @endif
</div>




    
@endsection
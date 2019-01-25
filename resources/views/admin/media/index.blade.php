@extends('layouts.admin')

@section('content')

<h1>Media</h1>

@if($photos)
<form action="delete/media" method="post" class="form-inline">
  {{csrf_field()}}
  {{method_field('delete')}}
  <div class="form-group">
    <select name="checkBoxArray" class="form-control">
      <option value="">Delete</option>
    </select>
  </div>
  <div class="form-group">
      <input type="submit" name="delete_all" class="btn-primary">
    </div>
<table class="table">
        <thead>
          <tr>
            <th><input type="checkbox" id="options"></th>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
           
           
          </tr>
        </thead>
        <tbody>
            @if($photos)

            
           

            @foreach ($photos as $photo)
                
            
            <tr>
              <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="" value="{{$photo->id}}"></td>
               <td>{{$photo->id}}</td>
               <td><img src="{{$photo->file}}" alt=""></td>
               <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
               <td>

                <input type="hidden" name="photo" value="{{$photo->id}}">
               
                
            
            
               </td>
              

            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
  </form>
@endif


    
@endsection

@section('scripts')
<script>

    $(document).ready(function(){

      $('#options').click(function(){

        if(this.checked){
          $('.checkBoxes').each(function(){
              this.checked = true;
          });
        }else{
          $('.checkBoxes').each(function(){
              this.checked = false;
          });
        }

        console.log('it works')

      });
    });
  
  </script>
@endsection
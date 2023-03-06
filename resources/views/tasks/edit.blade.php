@extends('tasks.layout')
@section('content')
<div class="card">
  <div class="card-header">Task Page</div>
  <div class="card-body">
      
      <form action="{{ url('task/' .$tasks->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$tasks->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$tasks->name}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop
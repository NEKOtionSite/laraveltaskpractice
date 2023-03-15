@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                        <h2>Current Task</h2>
                        <div id = "dialog-1" >
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label" style="width: 1000px;">Task Name:</label>
 
                <div class="col-sm-6">
                    <br>
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <br>
 
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add a Task
                    </button>
                </div>
            </div>
        </form>
        </div>
        </div>
                  <button id = "opener">Add Task</button>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="color:darkblue">Task Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $item)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <form method="POST" action="{{ url('/task' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary" title="Delete Task" onclick="return confirm(&quot;Sureness you want to delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('contents')

<h3>Add new Task</h3>
<hr>

<form class="form-horizontal" action="{{ url('/categories') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2">Task Name:</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Task Name">
            {{-- value="{{old('category_name')}}" uses for jate input field besi thakleo validation er somoy abar sob
            field empty na hoye jay --}}
        </div>
    </div>
    {{-- Task Details --}}
    <div class="form-group">
        <label class="control-label col-sm-2">Task details:</label>
        <div class="col-sm-10">
            <textarea name="details" id="" cols="30" rows="10" class="form-control">{{ old("details") }}</textarea>
        </div>
    </div>
    {{-- Deadline --}}
    <div class="form-group">
        <label class="control-label col-sm-2">Task dateline:</label>
        <div class="col-sm-10">
            <input type="date" name="deadline" value="{{ old("deadline") }}" class="form-control">
        </div>
    </div>
    {{-- Status --}}
    <div class="form-group">
        <label class="control-label col-sm-2">Task Status:</label>
        <div class="col-sm-10">
            <select name="satus" class="form-control">
               @foreach ($task_status as $x=> $status)
               <option value="{{ $x }}">{{$status}}</option>

                   
               @endforeach
            </select>
        </div>
    </div>
    {{-- Submit buttom --}}
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">create</button>
        </div>
    </div>

</form>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection

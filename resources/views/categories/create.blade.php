@extends('layouts.app')
@section('contents')

<h3>Create a new Category</h3>
<hr>

<form class="form-horizontal" action="{{ url('/categories') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2">Category Name:</label>
        <div class="col-sm-10">
            <input type="text" name="category_name"class="form-control"
            value="{{old('category_name')}}" placeholder="Enter Category Name">
            {{-- value="{{old('category_name')}}"       uses for jate input field besi thakleo validation er somoy abar sob field empty na hoye jay       --}}
        </div>
    </div>
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

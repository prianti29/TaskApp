@extends('layouts.app')
@section('contents')

<a href="{{ url('/tasks/create') }}" class="btn btn-success">Add new Task</a>
<hr>
<table class="table table-bordered">
    <tr>
        <th>name</th>
        <th>Details</th>
        <th>Category</th>
        <th>Deadline</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
 @foreach ($tasks as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->details }}</td>
        <td>{{ $item->category->name }}</td>
        <td>{{ $item->deadline }}</td>
        {{-- <td>{{ $item->status }}</td> --}}

        {{-- Use for status name --}}
        <td>{{ App\Enums\TaskStatus::getDescription($item->status); }}</td>  
        <td>

            <a href="{{ url("/categories/$item->id/edit") }}" class="btn btn-warning btn-sm">Update</a>
           
            <form action="{{ url("/categories/$item->id") }}" method="POST"
                onclick="return confirm('Are you sure you want to delete this item?');">
                @csrf
                @method('delete')
                <input type="submit" name="" id="" value="Delete" class="btn btn-danger btn-sm">
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection

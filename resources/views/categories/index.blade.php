@extends('layouts.app')
@section('contents')

<a href="{{ url('/categories/create') }}" class="btn btn-success">Add new categories</a>
<hr>
<table class="table table-bordered">
    <tr>
        <th>name</th>
        <th>Action</th>

    </tr>
    @foreach ($category_list as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td>

            <a href="{{ url("/categories/$item->id/edit") }}" class="btn btn-warning btn-sm">Update</a>
            {{-- <a href="" class="btn btn-danger btn-sm">Delete</a> --}}
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

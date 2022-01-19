@extends('layouts.app')

@section('contents')

{{-- to show name in dashboard --}}
<h1>hello {{ Auth::user()->name }}</h1>

@endsection

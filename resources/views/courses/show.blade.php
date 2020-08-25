@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        <div class="container">
            Course Details
            @include('lessons.index', ['lessons' => $course->lessons])
    </div>
@endsection

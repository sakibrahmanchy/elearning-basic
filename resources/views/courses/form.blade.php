@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        @include('adminpanel.adminSidebar')
        <div class="container">
            @if(!$course->exists)
                <h2 align="center">Create new Course</h2>
            @else
                <h2 align="center">Edit Course: {{ $course->title }}</h2>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                @if($course->exists)
                    <form action="{{route('courses.update', $course->id)}}" method="post">
                        @method('put')
                @else
                    <form action="{{route('courses.store')}}" method="post">
                @endif
                    @csrf
                    <div class="form-group">
                        <label>Course Title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            placeholder="Course Title"
                            value="{{$course->title}}"
                        >
                    </div>
                    <div class="form-group">
                        <label>Course Subtitle</label>
                        <input
                            type="text"
                            name="subtitle"
                            class="form-control"
                            placeholder="Course Subtitle"
                            value="{{$course->subtitle}}"
                        >
                    </div>
                    <div class="form-group">
                        <label>Course Description</label>
                        <textarea
                            type="text"
                            name="description"
                            class="form-control"
                            placeholder="Course Description"
                        >
                            {{ $course->description }}
                        </textarea>
                    </div>
                    <input
                        type="submit"
                        name="submit"
                        id="submit"
                        class="btn btn-info"
                        value="{{ $course->exists ? 'Update' : 'Create' }} Course"/>
                </form>
            </div>
        </div>
    </div>
@endsection

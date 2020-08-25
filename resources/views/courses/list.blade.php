@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <h3 class="page-title">All Courses</h3>
                    <br/>
                    <br/>
                    <div class="row">
                        @foreach($courses as $course)
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $course->title }}</h3>
                                        <h5 class="card-subtitle">{{ $course->subtitle }}</h5>
                                        <p class="card-text">{{ $course->description }}</p>
                                        <a href="{{ route('courses.show', ['id' => $course->id]) }}" class="btn btn-primary">Take course</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

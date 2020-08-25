@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        @include('adminpanel.adminSidebar')
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <h3 class="page-title">All Lessons</h3>
                    @if(auth()->user()->isAdmin())
                        <a href="{{route('lessons.create')}}" class="btn btn-info float-right">Create New Lesson</a>
                        <br/>
                        <br/>
                        <table class="table table-bordered table-striped datatable">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Course</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($lessons as $lesson)
                                <tr>
                                    <td>
                                        {{ $lesson->title }}
                                    </td>
                                    <td>
                                        {{ $lesson->description }}
                                    </td>
                                    <td>
                                        {{ $lesson->course->title }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="row">
                            @foreach($lessons as $lesson)
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">{{ $lesson->title }}</h3>
                                            <h5 class="card-subtitle">Question count: {{ $lesson->questions->count() }}</h5>
                                            <p class="card-text">{{ $lesson->description }}</p>
                                            <a href="{{ route('lessons.show', ['id' => $lesson->id]) }}" class="btn btn-primary">Take Quiz #{{ $lesson->id }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        @include('adminpanel.adminSidebar')
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <h3 class="page-title">All Courses</h3>
                    <a href="{{route('courses.create')}}" class="btn btn-info float-right">Create New Course</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Description</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>
                                    {{ $course->title }}
                                        <a class="btn btn-sm" href="{{ route('courses.edit', $course->id) }}">
                                        <small>Edit</small>
                                    </a>
                                </td>
                                <td>
                                    {{ $course->subtitle }}
                                </td>
                                <td>
                                    {{ $course->description }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="d-flex" id="wrapper">
        @include('adminpanel.adminSidebar')
        <create-lesson :courses="'{{ json_encode($courses) }}'"/>
    </div>
@endsection

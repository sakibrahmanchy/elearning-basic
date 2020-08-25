@if(auth()->user()->isAdmin())
<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Admin Panel </div>
    <div class="list-group list-group-flush">
        <a href="{{route('courses.index')}}" class="list-group-item list-group-item-action bg-light">Courses</a>
        <a href="{{route('lessons.index')}}" class="list-group-item list-group-item-action bg-light">Lessons</a>
        <a href="{{route('results.index')}}" class="list-group-item list-group-item-action bg-light">All Results</a>
        <a href="{{route('users.index')}}" class="list-group-item list-group-item-action bg-light">User management</a>
    </div>
</div>


<!-- Page Content -->
<div id="page-content-wrapper">
@endif

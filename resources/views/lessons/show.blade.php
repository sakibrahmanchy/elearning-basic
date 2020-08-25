@extends('layouts.app')

@section('content')
    <div class="container">
        @if($lesson)
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <h1>{{$lesson->title}}</h1>
                    <form action="{{route('results.store')}}" method="post">
                        @csrf
                        <div>
                            <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                            @foreach($lesson->questions as $question )
                                <div>
                                    <h3>{{$question->question_text}}</h3>
                                    <input type="hidden" name="question_id[]" value="{{$question->id}}">
                                    @foreach($question->options as $option)
                                        <div>
                                            <input type="checkbox" name="option[{{$question->id}}][{{$option->id}}]"
                                                   value="{{$option->correct}}">
                                            {{$option->option}}
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                            @endforeach
                        </div>
                        <a href="{{route('results.show', $lesson->id)}}"><input type="submit" value="Submit"
                                                                               class="btn btn-success mt-3"></a>
                    </form>
                </div>
            </div>
        @else
            <h1>No Topic</h1>
        @endif
    </div>
@endsection

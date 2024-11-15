@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Welcome! Here are some statistics about LaraQuiz.
                </div>

                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h1>{{ $questions }}</h1>
                            <p>questions in our database</p>
                        </div>
                        <div class="col-md-3">
                            <h1>{{ $users }}</h1>
                            <p>users registered</p>
                        </div>
                        <div class="col-md-3">
                            <h1>{{ $quizzes }}</h1>
                            <p>quizzes taken</p>
                        </div>
                        <div class="col-md-3">
                            <h1>{{ number_format($average, 2) }} / 10</h1>
                            <p>average score</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Take a quiz button -->
            <div class="mt-4 text-center">
                <a href="{{ route('tests.index') }}" class="btn btn-success">
                    Take a new quiz!
                </a>
            </div>
        </div>
    </div>
@endsection
